<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The class used to present the result of log histogram status. For every log
 * histogram, it contains : from/to time range, hit log count and query
 * completed status.
 *
 * @author log service dev
 */
class Histogram {
    private int $from;
    private int $to;
    private int $count;
    private string $progress;

    public function __construct(int $from, int $to, int $count, string $progress) {
        $this->from = $from;
        $this->to = $to;
        $this->count = $count;
        $this->progress = $progress;
    }

    public function getFrom(): int {
        return $this->from;
    }

    public function getTo(): int {
        return $this->to;
    }

    public function getCount(): int {
        return $this->count;
    }

    public function isCompleted(): bool {
        return $this->progress == 'Complete';
    }
}
