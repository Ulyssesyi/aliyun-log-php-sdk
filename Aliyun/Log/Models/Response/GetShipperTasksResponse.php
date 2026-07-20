<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class GetShipperTasksResponse extends \Aliyun\Log\Models\Response {
    private int $count;

    private int $total;

    private string $statistics;

    /** @var array<int, mixed> */
    private array $tasks;

    /**
     * GetShipperTasksResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
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
     */
    public function getCount(): int {
        return $this->count;
    }

    /**
     * Get total
     */
    public function getTotal(): int {
        return $this->total;
    }

    /**
     * Get statistics
     */
    public function getStatistics(): string {
        return $this->statistics;
    }

    /**
     * Get tasks
     *
     * @return array<int, mixed>
     */
    public function getTasks(): array {
        return $this->tasks;
    }
}
