<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class UpdateShipperRequest extends Request {
    private ?string $shipperName;
    private ?string $targetType;
    private mixed $targetConfigration = null;
    private ?string $logStore;

    public function __construct(string $project) {
        parent::__construct($project);
    }

    public function getLogStore(): ?string {
        return $this->logStore;
    }

    public function setLogStore(?string $logStore): void {
        $this->logStore = $logStore;
    }

    public function getShipperName(): ?string {
        return $this->shipperName;
    }

    public function setShipperName(?string $shipperName): void {
        $this->shipperName = $shipperName;
    }

    public function getTargetType(): ?string {
        return $this->targetType;
    }

    public function setTargetType(?string $targetType): void {
        $this->targetType = $targetType;
    }

    public function getTargetConfigration(): mixed {
        return $this->targetConfigration;
    }

    public function setTargetConfigration(mixed $targetConfigration): void {
        $this->targetConfigration = $targetConfigration;
    }
}
