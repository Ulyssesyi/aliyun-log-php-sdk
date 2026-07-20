<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Histogram;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetHistograms API from log service.
 *
 * @author log service dev
 */
class GetHistogramsResponse extends Response {
    private string $progress;
    private int $count;

    /** @var Histogram[] */
    private array $histograms;

    /**
     * @param array $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);

        $progress = $header['x-log-progress'];
        $this->progress = is_string($progress) ? $progress : '';

        $count = $header['x-log-count'];
        $this->count = is_numeric($count) ? (int) $count : 0;

        $this->histograms = [];
        foreach ($resp as $data) {
            if (!is_array($data)) {
                continue;
            }
            $this->histograms[] = new Histogram(
                is_numeric($data['from'] ?? null) ? (int) $data['from'] : 0,
                is_numeric($data['to'] ?? null) ? (int) $data['to'] : 0,
                is_numeric($data['count'] ?? null) ? (int) $data['count'] : 0,
                is_string($data['progress'] ?? null) ? $data['progress'] : '',
            );
        }
    }

    public function isCompleted(): bool {
        return $this->progress == 'Complete';
    }

    public function getTotalCount(): int {
        return $this->count;
    }

    /** @return Histogram[] */
    public function getHistograms(): array {
        return $this->histograms;
    }
}
