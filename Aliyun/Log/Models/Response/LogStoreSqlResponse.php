<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the LogStore SQL query API from log service.
 *
 * @author log service dev
 */
class LogStoreSqlResponse extends Response {
    private int $count;
    private string $progress;

    /** @var QueriedLog[] */
    private array $logs;

    private int $processedRows;
    private int $elapsedMilli;
    private int $cpuSec;
    private int $cpuCores;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);

        $cnt = $header['x-log-count'];
        $this->count = is_numeric($cnt) ? (int) $cnt : 0;

        $prog = $header['x-log-progress'];
        $this->progress = is_string($prog) ? $prog : '';

        $rows = $header['x-log-processed-rows'];
        $this->processedRows = is_numeric($rows) ? (int) $rows : 0;

        $elapsed = $header['x-log-elapsed-millisecond'] ?? null;
        $this->elapsedMilli = is_numeric($elapsed) ? (int) $elapsed : 0;

        $cpuSec = $header['x-log-cpu-sec'] ?? null;
        $this->cpuSec = is_numeric($cpuSec) ? (int) $cpuSec : 0;

        $cpuCores = $header['x-log-cpu-cores'] ?? null;
        $this->cpuCores = is_numeric($cpuCores) ? (int) $cpuCores : 0;

        $this->logs = [];
        foreach ($resp as $data) {
            if (!is_array($data)) {
                continue;
            }
            $rawTime = $data['__time__'] ?? null;
            $time = is_numeric($rawTime) ? (int) $rawTime : 0;
            $rawSource = $data['__source__'] ?? null;
            $source = is_string($rawSource) ? $rawSource : '';

            $contents = [];
            foreach ($data as $key => $value) {
                if (!is_string($key)) {
                    continue;
                }
                if ($key === '__time__' || $key === '__source__') {
                    continue;
                }
                $contents[$key] = is_string($value) ? $value : '';
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
