<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetHistograms API from log service.
 *
 * @author log service dev
 */
class GetHistogramsResponse extends \Aliyun\Log\Models\Response {
    private string $progress;

    private int $count;

    /** @var \Aliyun\Log\Models\Histogram[] */
    private array $histograms;

    /**
     * GetHistogramsResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->progress = $header['x-log-progress'];
        $this->count = (int) $header['x-log-count'];
        $this->histograms = [];
        foreach ($resp as $data) {
            $this->histograms[] = new \Aliyun\Log\Models\Histogram($data['from'], $data['to'], $data['count'], $data['progress']);
        }
    }

    /**
     * Check if the histogram is completed
     */
    public function isCompleted(): bool {
        return $this->progress == 'Complete';
    }

    /**
     * Get total logs' count that current query hits
     */
    public function getTotalCount(): int {
        return $this->count;
    }

    /**
     * Get histograms on the requested time range: [from, to)
     *
     * @return \Aliyun\Log\Models\Histogram[]
     */
    public function getHistograms(): array {
        return $this->histograms;
    }
}
