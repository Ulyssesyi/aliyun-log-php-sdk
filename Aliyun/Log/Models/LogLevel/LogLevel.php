<?php declare(strict_types=1);

namespace Aliyun\Log\Models\LogLevel;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * Log level enum for SimpleLogger.
 */
enum LogLevel: string {
    case DEBUG = 'debug';
    case INFO = 'info';
    case WARN = 'warn';
    case ERROR = 'error';
}
