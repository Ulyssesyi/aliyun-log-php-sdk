<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the LogStore SQL query API from log service.
 *
 * @author log service dev
 */
class LogStoreSqlResponse extends \Aliyun\Log\Models\Response {
    private int $count;

    private string $progress;

    /** @var QueriedLog[] */
    private array $logs;

    private int $processedRows;

    private int $elapsedMilli;

    private int $cpuSec;

    private int $cpuCores;

    /**
     * LogStoreSqlResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = (int) $header['x-log-count'];
        $this->progress = $header['x-log-progress'];
        $this->processedRows = (int) $header['x-log-processed-rows'];
        $this->elapsedMilli = isset($header['x-log-elapsed-millisecond']) ? (int) $header['x-log-elapsed-millisecond'] : 0;
        $this->cpuSec = isset($header['x-log-cpu-sec']) ? (int) $header['x-log-cpu-sec'] : 0;
        $this->cpuCores = isset($header['x-log-cpu-cores']) ? (int) $header['x-log-cpu-cores'] : 0;
        $this->logs = [];
        foreach ($resp as $data) {
            $contents = $data;
            $time = $data['__time__'];
            $source = $data['__source__'];
            unset($contents['__time__'], $contents['__source__']);

            $this->logs[] = new QueriedLog($time, $source, $contents);
        }
    }

    /**
     * Get log number from the response
     */
    public function getCount(): int {
        return $this->count;
    }

    /**
     * Check if the query is completed
     */
    public function isCompleted(): bool {
        return $this->progress == 'Complete';
    }

    /**
     * Get all logs from the response
     *
     * @return QueriedLog[]
     */
    public function getLogs(): array {
        return $this->logs;
    }

    /**
     * Get processedRows
     */
    public function getProcessedRows(): int {
        return $this->processedRows;
    }

    /**
     * Get elapsedMilli
     */
    public function getElapsedMilli(): int {
        return $this->elapsedMilli;
    }

    /**
     * Get cpuSec
     */
    public function getCpuSec(): int {
        return $this->cpuSec;
    }

    /**
     * Get cpuCores
     */
    public function getCpuCores(): int {
        return $this->cpuCores;
    }
}
