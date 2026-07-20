<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class GetShipperTasksRequest extends Request {
    private ?string $shipperName;
    private ?string $logStore;
    private ?int $startTime;
    private ?int $endTime;

    /** support one of ['', 'fail', 'success', 'running'], if '' returns all status types */
    private ?string $statusType;

    private ?int $offset;
    private ?int $size;

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

    public function getStartTime(): ?int {
        return $this->startTime;
    }

    public function setStartTime(?int $startTime): void {
        $this->startTime = $startTime;
    }

    public function getEndTime(): ?int {
        return $this->endTime;
    }

    public function setEndTime(?int $endTime): void {
        $this->endTime = $endTime;
    }

    public function getStatusType(): ?string {
        return $this->statusType;
    }

    public function setStatusType(?string $statusType): void {
        $this->statusType = $statusType;
    }

    public function getOffset(): ?int {
        return $this->offset;
    }

    public function setOffset(?int $offset): void {
        $this->offset = $offset;
    }

    public function getSize(): ?int {
        return $this->size;
    }

    public function setSize(?int $size): void {
        $this->size = $size;
    }
}
