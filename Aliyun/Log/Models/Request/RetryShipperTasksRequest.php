<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

class RetryShipperTasksRequest extends \Aliyun\Log\Models\Request {
    private ?string $shipperName;

    private ?string $logStore;

    private mixed $taskLists = null;

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
     * @return mixed|null
     */
    public function getTaskLists() {
        return $this->taskLists;
    }

    /**
     * @param mixed|null $taskLists
     */
    public function setTaskLists($taskLists): void {
        $this->taskLists = $taskLists;
    }
}
