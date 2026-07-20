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
    /** @var LogItem[] internal cache for log messages */
    private array $logItems = [];

    private int $maxCacheLog;
    private int $maxWaitTime;
    private int $previousLogTime;
    private int $maxCacheBytes;
    private int $cacheBytes;

    public function __construct(
        private Client $client,
        private string $project,
        private string $logstore,
        private ?string $topic = null,
        ?int $maxCacheLog = null,
        ?int $maxWaitTime = null,
        ?int $maxCacheBytes = null,
    ) {
        $this->maxCacheLog = is_int($maxCacheLog) ? $maxCacheLog : 100;
        $this->maxCacheBytes = is_int($maxCacheBytes) ? $maxCacheBytes : 256 * 1024;
        if (is_int($maxWaitTime)) {
            $this->maxWaitTime = $maxWaitTime;
        } else {
            $this->maxWaitTime = 5;
        }
        $this->previousLogTime = time();
        $this->cacheBytes = 0;
    }

    /** add logItem to cached array, post when cache reaches limitation */
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

    private function logSingleMessage(LogLevel $logLevel, string $logMessage): void {
        $cur_time = time();
        $contents = [ // key-value pair
            'time' => date('m/d/Y h:i:s a', $cur_time),
            'loglevel' => $logLevel->value,
            'msg' => $logMessage,
        ];
        $this->cacheBytes += strlen($logMessage) + 32;
        $logItem = new LogItem();
        $logItem->setTime($cur_time);
        $logItem->setContents($contents);
        $this->logItem($cur_time, $logItem);
    }

    /**
     * @param array<string, mixed> $logMessage
     */
    private function logArrayMessage(LogLevel $logLevel, array $logMessage): void {
        $cur_time = time();
        $contents = [ // key-value pair
            'time' => date('m/d/Y h:i:s a', $cur_time),
        ];
        $contents['logLevel'] = $logLevel->value;
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

    public function info(string $logMessage): void {
        $logLevel = LogLevel::INFO;
        $this->logSingleMessage($logLevel, $logMessage);
    }

    public function debug(string $logMessage): void {
        $logLevel = LogLevel::DEBUG;
        $this->logSingleMessage($logLevel, $logMessage);
    }

    public function warn(string $logMessage): void {
        $logLevel = LogLevel::WARN;
        $this->logSingleMessage($logLevel, $logMessage);
    }

    public function error(string $logMessage): void {
        $logLevel = LogLevel::ERROR;
        $this->logSingleMessage($logLevel, $logMessage);
    }

    /**
     * @param array<string, mixed> $logMessage
     */
    public function infoArray(array $logMessage): void {
        $logLevel = LogLevel::INFO;
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * @param array<string, mixed> $logMessage
     */
    public function debugArray(array $logMessage): void {
        $logLevel = LogLevel::DEBUG;
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * @param array<string, mixed> $logMessage
     */
    public function warnArray(array $logMessage): void {
        $logLevel = LogLevel::WARN;
        $this->logArrayMessage($logLevel, $logMessage);
    }

    /**
     * @param array<string, mixed> $logMessage
     */
    public function errorArray(array $logMessage): void {
        $logLevel = LogLevel::ERROR;
        $this->logArrayMessage($logLevel, $logMessage);
    }

    private function getLocalIp(): string {
        return Util::getLocalIp();
    }

    /**
     * @param LogItem[] $logItems
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
        error_log('SimpleLogger: ' . (string) $error_exception);
    }

    /** manually flush all cached log to log server */
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
