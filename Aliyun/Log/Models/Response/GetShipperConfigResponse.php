<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class GetShipperConfigResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var string shipper name
     */
    private $shipperName;

    /**
     * @var string target type
     */
    private $targetType;

    /**
     * @var string target configuration
     */
    private $targetConfigration;

    /**
     * GetShipperConfigResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->shipperName = $resp['shipperName'];
        $this->targetConfigration = $resp['targetConfiguration'];
        $this->targetType = $resp['targetType'];
    }

    /**
     * Get shipper name
     *
     * @return string shipper name
     */
    public function getShipperName() {
        return $this->shipperName;
    }

    /**
     * Get target type
     *
     * @return string target type
     */
    public function getTargetType() {
        return $this->targetType;
    }

    /**
     * Get target configuration
     *
     * @return string target configuration
     */
    public function getTargetConfigration() {
        return $this->targetConfigration;
    }
}
