<?php declare(strict_types=1);

namespace Aliyun\Log;

use Aliyun\Log\Models\LogItem;
use Aliyun\Log\Models\LogLevel\LogLevel;
use Aliyun\Log\Models\Request\PutLogsRequest;
use Exception;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * Class SimpleLogger
 * a wrapper for submit log message to server, to avoid post log frequently, using a internal cache for messages
 * When the count of messages reach the cache size, SimpleLogger will post the messages in bulk, and reset the cache accordingly.
 */
class SimpleLogger {
    /**
     * internal cache for log messages
     * @var LogItem[]
     */
    private array $logItems = [];

    /**
     * max size of cached messages
     */
    private int $maxCacheLog;

    /**
     * log topic field
     */
    private ?string $topic;

    /**
     * max time before logger post the cached messages
     */
    private int $maxWaitTime;

    /**
     * previous time for posting log messages
     */
    private int $previousLogTime;

    /**
     * max storage size for cached messages
     */
    private int $maxCacheBytes;

    /**
     * messages storage size for cached messages
     */
    private int $cacheBytes;

    /**
     * log client which was wrappered by this logger
     */
    private Client $client;

    /**
     * log project name
     */
    private string $project;

    /**
     * logstore name
     */
    private string $logstore;

    /**
     * SimpleLogger constructor.
     * @param $client log client
     * @param $project the corresponding project
     * @param $logstore the logstore
     * @param $topic
     * @param null $maxCacheLog max log items limitation, by default it's 100
     * @param null $maxWaitTime max thread waiting time, bydefault it's 5 seconds
     */
    public function __construct(Client $client, string $project, string $logstore, ?string $topic, ?int $maxCacheLog = null, ?int $maxWaitTime = null, ?int $maxCacheBytes = null) {
        $this->maxCacheLog = is_int($maxCacheLog) ? $maxCacheLog : 100;
        $this->maxCacheBytes = is_int($maxCacheBytes) ? $maxCacheBytes : 256 * 1024;
        if (is_int($maxWaitTime)) {
            $this->maxWaitTime = $maxWaitTime;
        } else {
            $this->maxWaitTime = 5;
        }
        if ($client == null || $project == null || $logstore == null) {
            throw new Exception('the input parameter is invalid! create SimpleLogger failed!');
        }
        $this->client = $client;
        $this->project = $project;
        $this->logstore = $logstore;
        $this->topic = $topic;
        $this->previousLogTime = time();
        $this->cacheBytes = 0;
    }

    /**
     * add logItem to cached array, and post the cached messages when cache reach the limitation
     * @param $cur_time
     * @param $logItem
     */
    private function logItem(int $cur_time, LogItem $logItem): void {
        array_push($this->logItems, $logItem);
        if ($cur_time - $this->previousLogTime >= $this->maxWaitTime || count($this->logItems) >= $this->maxCacheLog
            || $this->cacheBytes >= $this->maxCacheBytes) {
            $this->logBatch($this->logItems, $this->topic);
            $this->logItems = [];
            $this->previousLogTime = time();
            $this->cacheBytes = 0;
        }
    }

    /**
     * log single string message
     * @param LogLevel $logLevel
     * @param string $logMessage
     */
    private function logSingleMessage(LogLevel $logLevel, string $logMessage): void {
        $cur_time = time();
        $contents = [ // key-value pair
            'time' => date('m/d/Y h:i:s a', $cur_time),
            'loglevel' => LogLevel::getLevelStr($logLevel),
            'msg' => $logMessage,
        ];
        $this->cacheBytes += strlen($logMessage) + 32;
        $logItem = new LogItem();
        $logItem->setTime($cur_time);
        $logItem->setContents($contents);
        $this->logItem($cur_time, $logItem);
    }

    /**
     * log array message
     * @param LogLevel $logLevel
     * @param array<string, mixed> $logMessage
     */
    private function logArrayMessage(LogLevel $logLevel, array $logMessage): void {
        $cur_time = time();
        $contents = [ // key-value pair
            'time' => date('m/d/Y h:i:s a', $cur_time),
        ];
        $contents['logLevel'] = LogLevel::getLevelStr($logLevel);
        foreach ($logMessage as $key => $value) {
            $contents[$key] = $value;
            $this->cacheBytes += strlen((string) $key) + strlen((string) $value);
        }
        $this->cacheBytes += 32;
        $logItem = new LogItem();
        $logItem->setTime($cur_time);
        $logItem->setContents($contents);
        $this->logItem($cur_time, $logItem);
    }

    /**
     * submit string log message with info level
     * @param $logMessage
     */
    public function info(string $logMessage): void {
        $logLevel = LogLevel::getLevelInfo();
        $this->logSingleMessage($logLevel, $logMessage);
    }

    /**
     * submit string log message with debug level
     * @param $logMessage
     */
    public function debug(string $logMessage): void {
        $logLevel = LogLevel::getLevelDebug();
        $this->logSingleMessage($logLevel, $logMessage);
    }

    /**
     * submit string log message with warn level
     * @param $logMessage
     */
    public function warn(string $logMessage): void {
        $logLevel = LogLevel::getLevelWarn();
        $this->logSingleMessage($logLevel, $logMessage);
    }

    /**
     * submit string log message with error level
     * @param $logMessage
     */
    public function error(string $logMessage): void {
        $logLevel = LogLevel::getLevelError();
        $this->logSingleMessage($logLevel, $logMessage);
    }

    /**
     * submit array log message with info level
     * @param array<string, mixed> $logMessage
     */
    public function infoArray(array $logMessage): void {
        $logLevel = LogLevel::getLevelInfo();
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * submit array log message with debug level
     * @param array<string, mixed> $logMessage
     */
    public function debugArray(array $logMessage): void {
        $logLevel = LogLevel::getLevelDebug();
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * submit array log message with warn level
     * @param array<string, mixed> $logMessage
     */
    public function warnArray(array $logMessage): void {
        $logLevel = LogLevel::getLevelWarn();
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * submit array log message with error level
     * @param array<string, mixed> $logMessage
     */
    public function errorArray(array $logMessage): void {
        $logLevel = LogLevel::getLevelError();
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * get current machine IP
     * @return string
     */
    private function getLocalIp(): string {
        $local_ip = gethostbyname(php_uname('n'));
        if (strlen($local_ip) == 0) {
            $local_ip = gethostbyname(gethostname());
        }
        return $local_ip;
    }

    /**
     * submit log messages in bulk
     * @param LogItem[] $logItems
     * @param string|null $topic
     */
    private function logBatch(array $logItems, ?string $topic): void {
        $ip = $this->getLocalIp();
        $request = new PutLogsRequest(
            $this->project,
            $this->logstore,
            $topic,
            $ip,
            $logItems,
        );
        $error_exception = null;
        for ($i = 0 ;  $i < 3 ; $i++) {
            try {
                $response = $this->client->putLogs($request);
                return;
            } catch (Exception $ex) {
                $error_exception = $ex;
            }
        }
        if ($error_exception != null) {
            var_dump($error_exception);
        }
    }

    /**
     * manually flush all cached log to log server
     */
    public function logFlush(): void {
        if (count($this->logItems) > 0) {
            $this->logBatch($this->logItems, $this->topic);
            $this->logItems = [];
            $this->previousLogTime = time();
            $this->cacheBytes = 0;
        }
    }

    public function __destruct() {
        if (count($this->logItems) > 0) {
            $this->logBatch($this->logItems, $this->topic);
        }
    }
}
