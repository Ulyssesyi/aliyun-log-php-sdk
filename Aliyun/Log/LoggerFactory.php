<?php declare(strict_types=1);

namespace Aliyun\Log;

use Exception;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * Class Aliyun_Log_LoggerFactory
 * Factory for creating logger instance, with $client, $project, $logstore, $topic configurable.
 * Will flush current logger when the factory instance was recycled.
 */
class LoggerFactory {
    /** @var array<string, SimpleLogger> */
    private static array $loggerMap = [];

    public static function getLogger(Client $client, string $project, string $logstore, ?string $topic = null): SimpleLogger {
        if ($project == '') {
            throw new Exception('project name is blank!');
        }
        if ($logstore == '') {
            throw new Exception('logstore name is blank!');
        }
        if ($topic === null) {
            $topic = '';
        }
        $loggerKey = $project.'#'.$logstore.'#'.$topic;
        if (!array_key_exists($loggerKey, self::$loggerMap)) {
            $instanceSimpleLogger = new SimpleLogger($client, $project, $logstore, $topic);
            self::$loggerMap[$loggerKey] = $instanceSimpleLogger;
        }
        return self::$loggerMap[$loggerKey];
    }

    protected function __construct() {

    }

    private function __clone() {
    }

    public function __destruct() {
        if (self::$loggerMap != null) {
            foreach (self::$loggerMap as $innerLogger) {
                $innerLogger->logFlush();
            }
        }
    }
}
