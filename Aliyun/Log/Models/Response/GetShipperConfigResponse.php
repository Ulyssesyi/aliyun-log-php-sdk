<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class GetShipperConfigResponse extends \Aliyun\Log\Models\Response {
    private string $shipperName;

    private string $targetType;

    private string $targetConfigration;

    /**
     * GetShipperConfigResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->shipperName = $resp['shipperName'];
        $this->targetConfigration = $resp['targetConfiguration'];
        $this->targetType = $resp['targetType'];
    }

    /**
     * Get shipper name
     */
    public function getShipperName(): string {
        return $this->shipperName;
    }

    /**
     * Get target type
     */
    public function getTargetType(): string {
        return $this->targetType;
    }

    /**
     * Get target configuration
     */
    public function getTargetConfigration(): string {
        return $this->targetConfigration;
    }
}
