<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the Project SQL query API from log service.
 *
 * @author log service dev
 */
class ProjectSqlResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int log number
     */
    private $count;

    /**
     * @var string logs query status(Complete or InComplete)
     */
    private $progress;

    /**
     * @var QueriedLog[] all log data
     */
    private $logs;

    /**
     * @var int rows processed in this request
     */
    private $processedRows;

    /**
     * @var int execution latency in milliseconds
     */
    private $elapsedMilli;

    /**
     * @var int used cpu sec for this request
     */
    private $cpuSec;

    /**
     * @var int used cpu core number for this request
     */
    private $cpuCores;

    /**
     * ProjectSqlResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
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
     *
     * @return int log number
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Check if the query is completed
     *
     * @return bool true if this query is completed
     */
    public function isCompleted() {
        return $this->progress == 'Complete';
    }

    /**
     * Get all logs from the response
     *
     * @return QueriedLog[] all log data
     */
    public function getLogs() {
        return $this->logs;
    }

    /**
     * Get processedRows
     *
     * @return int processed rows
     */
    public function getProcessedRows() {
        return $this->processedRows;
    }

    /**
     * Get elapsedMilli
     *
     * @return int elapsed milliseconds
     */
    public function getElapsedMilli() {
        return $this->elapsedMilli;
    }

    /**
     * Get cpuSec
     *
     * @return int cpu seconds
     */
    public function getCpuSec() {
        return $this->cpuSec;
    }

    /**
     * Get cpuCores
     *
     * @return int cpu cores
     */
    public function getCpuCores() {
        return $this->cpuCores;
    }
}
