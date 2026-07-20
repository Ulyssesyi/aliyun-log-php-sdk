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
     * @param array<string, string> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->total = $resp['total'];
        $this->count = $resp['count'];
        $this->statistics = $resp['statistics'];
        $this->tasks = $resp['tasks'];
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
