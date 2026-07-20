<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\LogGroupList;
use Aliyun\Log\Models\Response;
use OutOfBoundsException;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the BatchGetLogs API from log service.
 *
 * @author log service dev
 */
class BatchGetLogsResponse extends Response {
    /** @var array<int, mixed> compressed Loggroup array */
    private array $logPackageList;

    private ?string $nextCursor;

    /**
     * BatchGetLogsResponse constructor
     *
     * @param LogGroupList $resp
     *            HTTP response body (LogGroupList)
     * @param array<string, mixed> $header
     *            HTTP response header
     */
    public function __construct(LogGroupList $resp, array $header) {
        parent::__construct($header);
        $this->logPackageList = $resp->getLogGroupListArray();
        $val = $header['x-log-cursor'] ?? null;
        $this->nextCursor = is_string($val) ? $val : null;
    }

    /**
     * Get log package list
     *
     * @return array<int, mixed> log package list
     */
    public function getLogPackageList() {
        return $this->logPackageList;
    }

    /**
     * Get next cursor
     *
     * @return string|null next cursor
     */
    public function getNextCursor() {
        return $this->nextCursor;
    }

    /**
     * Get count of log packages
     *
     * @return int count
     */
    public function getCount() {
        return count($this->logPackageList);
    }

    /**
     * Get log package at index
     *
     * @param int $index the index
     * @return mixed log package at index
     * @throws OutOfBoundsException if index is out of bounds
     */
    public function getLogPackage($index) {
        if ($index < $this->getCount()) {
            return $this->logPackageList[$index];
        } else {
            throw new OutOfBoundsException('Index must less than size of logPackageList');
        }
    }

    /**
     * Get log group list
     *
     * @return array<int, mixed> log group list
     */
    public function getLogGroupList() {
        return $this->logPackageList;
    }

    /**
     * Get log group at index
     *
     * @param int $index the index
     * @return mixed log group at index
     * @throws OutOfBoundsException if index is out of bounds
     */
    public function getLogGroup($index) {
        if ($index < $this->getCount()) {
            return $this->logPackageList[$index];
        } else {
            throw new OutOfBoundsException('Index must less than size of logPackageList');
        }
    }
}
