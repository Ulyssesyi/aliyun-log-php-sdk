<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

class GetShipperTasksRequest extends \Aliyun\Log\Models\Request {
    private ?string $shipperName;

    private ?string $logStore;

    private ?int $startTime;

    private ?int $endTime;

    /**
     * support one of ['', 'fail', 'success', 'running'] , if the status_type = '' , return all kinds of status type
     */
    private ?string $statusType;

    private ?int $offset;

    private ?int $size;

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
     * @return int|null
     */
    public function getStartTime(): ?int {
        return $this->startTime;
    }

    /**
     * @param int|null $startTime
     */
    public function setStartTime(?int $startTime): void {
        $this->startTime = $startTime;
    }

    /**
     * @return int|null
     */
    public function getEndTime(): ?int {
        return $this->endTime;
    }

    /**
     * @param int|null $endTime
     */
    public function setEndTime(?int $endTime): void {
        $this->endTime = $endTime;
    }

    /**
     * @return string|null
     */
    public function getStatusType(): ?string {
        return $this->statusType;
    }

    /**
     * @param string|null $statusType
     */
    public function setStatusType(?string $statusType): void {
        $this->statusType = $statusType;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     */
    public function setOffset(?int $offset): void {
        $this->offset = $offset;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int {
        return $this->size;
    }

    /**
     * @param int|null $size
     */
    public function setSize(?int $size): void {
        $this->size = $size;
    }
}
