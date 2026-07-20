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

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->progress = $header['x-log-progress'];
        $this->count = (int) $header['x-log-count'];
        $this->histograms = [];
        foreach ($resp as $data) {
            $this->histograms[] = new Histogram($data['from'], $data['to'], $data['count'], $data['progress']);
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
