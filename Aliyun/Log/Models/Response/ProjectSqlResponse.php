<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the Project SQL query API from log service.
 *
 * @author log service dev
 */
class ProjectSqlResponse extends Response {
    private int $count;
    private string $progress;

    /** @var QueriedLog[] */
    private array $logs;

    private int $processedRows;
    private int $elapsedMilli;
    private int $cpuSec;
    private int $cpuCores;

    /**
     * @param array $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $countVal = $header['x-log-count'];
        $this->count = is_numeric($countVal) ? (int) $countVal : 0;
        $progressVal = $header['x-log-progress'];
        $this->progress = is_string($progressVal) ? $progressVal : '';
        $processedRowsVal = $header['x-log-processed-rows'];
        $this->processedRows = is_numeric($processedRowsVal) ? (int) $processedRowsVal : 0;
        $elapsedMilliVal = $header['x-log-elapsed-millisecond'] ?? null;
        $this->elapsedMilli = is_numeric($elapsedMilliVal) ? (int) $elapsedMilliVal : 0;
        $cpuSecVal = $header['x-log-cpu-sec'] ?? null;
        $this->cpuSec = is_numeric($cpuSecVal) ? (int) $cpuSecVal : 0;
        $cpuCoresVal = $header['x-log-cpu-cores'] ?? null;
        $this->cpuCores = is_numeric($cpuCoresVal) ? (int) $cpuCoresVal : 0;
        $this->logs = [];
        foreach ($resp as $data) {
            $time = 0;
            $source = '';
            $contents = [];
            if (is_array($data)) {
                $timeVal = $data['__time__'] ?? null;
                $time = is_numeric($timeVal) ? (int) $timeVal : 0;
                $sourceVal = $data['__source__'] ?? null;
                $source = is_string($sourceVal) ? $sourceVal : '';
                foreach ($data as $key => $value) {
                    if ($key !== '__time__' && $key !== '__source__' && is_string($value)) {
                        $contents[(string) $key] = $value;
                    }
                }
            }

            $this->logs[] = new QueriedLog($time, $source, $contents);
        }
    }

    public function getCount(): int {
        return $this->count;
    }

    public function isCompleted(): bool {
        return $this->progress == 'Complete';
    }

    /** @return QueriedLog[] */
    public function getLogs(): array {
        return $this->logs;
    }

    public function getProcessedRows(): int {
        return $this->processedRows;
    }

    public function getElapsedMilli(): int {
        return $this->elapsedMilli;
    }

    public function getCpuSec(): int {
        return $this->cpuSec;
    }

    public function getCpuCores(): int {
        return $this->cpuCores;
    }
}
