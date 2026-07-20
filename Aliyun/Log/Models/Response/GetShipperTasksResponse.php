<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class GetShipperTasksResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int count
     */
    private $count;

    /**
     * @var int total
     */
    private $total;

    /**
     * @var string statistics
     */
    private $statistics;

    /**
     * @var array<int, mixed> tasks
     */
    private $tasks;

    /**
     * GetShipperTasksResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->total = $resp['total'];
        $this->count = $resp['count'];
        $this->statistics = $resp['statistics'];
        $this->tasks = $resp['tasks'];
    }

    /**
     * Get count
     *
     * @return int count
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Get total
     *
     * @return int total
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * Get statistics
     *
     * @return string statistics
     */
    public function getStatistics() {
        return $this->statistics;
    }

    /**
     * Get tasks
     *
     * @return array<int, mixed> tasks
     */
    public function getTasks() {
        return $this->tasks;
    }
}
