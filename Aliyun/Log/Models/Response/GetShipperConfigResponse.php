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

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->shipperName = $resp['shipperName'];
        $this->targetConfigration = $resp['targetConfiguration'];
        $this->targetType = $resp['targetType'];
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
