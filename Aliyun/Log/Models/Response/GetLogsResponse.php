<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetLog API from log service.
 *
 * @author log service dev
 */
class GetLogsResponse extends Response {
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
            if (!is_array($data)) {
                continue;
            }

            $timeVal = $data['__time__'] ?? 0;
            $time = is_numeric($timeVal) ? (int) $timeVal : 0;
            $sourceVal = $data['__source__'] ?? '';
            $source = is_string($sourceVal) ? $sourceVal : '';

            $contents = $data;
            unset($contents['__time__'], $contents['__source__']);

            /** @var array<string, string> $contents */
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
