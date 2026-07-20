<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class GetShipperConfigResponse extends Response {
    private string $shipperName;
    private string $targetType;
    private string $targetConfigration;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $val = $resp['shipperName'] ?? '';
        $this->shipperName = is_string($val) ? $val : '';
        $val = $resp['targetConfiguration'] ?? '';
        $this->targetConfigration = is_string($val) ? $val : '';
        $val = $resp['targetType'] ?? '';
        $this->targetType = is_string($val) ? $val : '';
    }

    public function getShipperName(): string {
        return $this->shipperName;
    }

    public function getTargetType(): string {
        return $this->targetType;
    }

    public function getTargetConfigration(): string {
        return $this->targetConfigration;
    }
}
