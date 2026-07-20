<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class ListShipperRequest extends Request {
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
}
