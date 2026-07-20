<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class GetShipperTasksResponse extends Response {
    private int $count;
    private int $total;
    private string $statistics;

    /** @var array<int, mixed> */
    private array $tasks;

    /**
     * @param array<mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);

        $totalVal = $resp['total'];
        $this->total = is_numeric($totalVal) ? (int) $totalVal : 0;

        $countVal = $resp['count'];
        $this->count = is_numeric($countVal) ? (int) $countVal : 0;

        $statisticsVal = $resp['statistics'];
        $this->statistics = is_string($statisticsVal) ? $statisticsVal : '';

        $tasksVal = $resp['tasks'];
        $this->tasks = is_array($tasksVal) ? $tasksVal : [];
    }

    public function getCount(): int {
        return $this->count;
    }

    public function getTotal(): int {
        return $this->total;
    }

    public function getStatistics(): string {
        return $this->statistics;
    }

    /** @return array<int, mixed> */
    public function getTasks(): array {
        return $this->tasks;
    }
}
