<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

class UpdateShipperRequest extends \Aliyun\Log\Models\Request {
    private ?string $shipperName;

    private ?string $targetType;

    private mixed $targetConfigration = null;

    private ?string $logStore;

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

    /**
     * @return string|null
     */
    public function getTargetType(): ?string {
        return $this->targetType;
    }

    /**
     * @param string|null $targetType
     */
    public function setTargetType(?string $targetType): void {
        $this->targetType = $targetType;
    }

    /**
     * @return mixed|null
     */
    public function getTargetConfigration() {
        return $this->targetConfigration;
    }

    /**
     * @param mixed|null $targetConfigration
     */
    public function setTargetConfigration($targetConfigration): void {
        $this->targetConfigration = $targetConfigration;
    }
}
