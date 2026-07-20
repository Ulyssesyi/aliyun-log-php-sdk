<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class RetryShipperTasksRequest extends Request {
    private ?string $shipperName;
    private ?string $logStore;
    private mixed $taskLists = null;

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

    public function getTaskLists(): mixed {
        return $this->taskLists;
    }

    public function setTaskLists(mixed $taskLists): void {
        $this->taskLists = $taskLists;
    }
}
