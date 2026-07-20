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

    /**
     * Get logger instance
     * @param Client $client valid log client
     * @param string $project which could be created in AliYun Logger Server configuration page
     * @param string $logstore which could be created in AliYun Logger Server configuration page
     * @param string|null $topic used to specified the log by TOPIC field
     * @return SimpleLogger return logger instance
     * @throws Exception if the input parameter is invalid, throw exception
     */
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

    /**
     * set modifier to protected for singleton pattern
     * Aliyun_Log_LoggerFactory constructor.
     */
    protected function __construct() {

    }

    /**
     * set clone function to private for singleton pattern
     */
    private function __clone() {
    }

    /**
     * flush current logger in destruct function
     */
    public function __destruct() {
        if (self::$loggerMap != null) {
            foreach (self::$loggerMap as $innerLogger) {
                $innerLogger->logFlush();
            }
        }
    }
}
