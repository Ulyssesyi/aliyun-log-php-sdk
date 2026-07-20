<?php declare(strict_types=1);

namespace Aliyun\Log\Models\LogLevel;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class LogLevel {
    public const debug = 'debug';
    public const info = 'info';
    public const warn = 'warn';
    public const error = 'error';

    /** @var array<string, self>|null */
    private static ?array $constCacheArray = null;

    private string $level;

    /**
     * Constructor
     *
     * @param string $level
     */
    private function __construct(string $level) {
        $this->level = $level;
    }

    /**
     * Compares two logger levels.
     *
     * @param mixed $other
     * @return boolean
     */
    public function equals(mixed $other): bool {
        if ($other instanceof LogLevel) {
            return $this->level == $other->level;
        }
        return false;
    }

    public static function getLevelDebug(): self {
        if (!isset(self::$constCacheArray[LogLevel::debug])) {
            self::$constCacheArray[LogLevel::debug] = new LogLevel('debug');
        }
        return self::$constCacheArray[LogLevel::debug];
    }

    public static function getLevelInfo(): self {
        if (!isset(self::$constCacheArray[LogLevel::info])) {
            self::$constCacheArray[LogLevel::info] = new LogLevel('info');
        }
        return self::$constCacheArray[LogLevel::info];
    }

    public static function getLevelWarn(): self {
        if (!isset(self::$constCacheArray[LogLevel::warn])) {
            self::$constCacheArray[LogLevel::warn] = new LogLevel('warn');
        }
        return self::$constCacheArray[LogLevel::warn];
    }

    public static function getLevelError(): self {
        if (!isset(self::$constCacheArray[LogLevel::error])) {
            self::$constCacheArray[LogLevel::error] = new LogLevel('error');
        }
        return self::$constCacheArray[LogLevel::error];
    }

    public static function getLevelStr(LogLevel $logLevel): string {

        $logLevelStr = '';
        switch ($logLevel->level) {
            case 'error':
                $logLevelStr = 'error';
                break;
            case 'warn':
                $logLevelStr = 'warn';
                break;
            case 'info':
                $logLevelStr = 'info';
                break;
            case 'debug':
                $logLevelStr = 'debug';
                break;
        }
        return $logLevelStr;
    }
}
