<?php
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

class GetShipperConfigRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string|null
     */
    private $shipperName;

    /**
     * @var string|null
     */
    private $logStore;

    /**
     * CreateShipperRequest Constructor
     *
     * @param string $project
     */
    public function __construct(string $project) {
        parent::__construct($project);
    }

    /**
     * @return string|null
     */
    public function getLogStore(): ?string {
        return $this->logStore;
    }

    /**
     * @param string|null $logStore
     */
    public function setLogStore(?string $logStore): void {
        $this->logStore = $logStore;
    }

    /**
     * @return string|null
     */
    public function getShipperName(): ?string {
        return $this->shipperName;
    }

    /**
     * @param string|null $shipperName
     */
    public function setShipperName(?string $shipperName): void {
        $this->shipperName = $shipperName;
    }
}
