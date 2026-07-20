<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 *
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class ListShardsRequest extends \Aliyun\Log\Models\Request {
    private ?string $logstore;

    /**
     * ListShardsRequest Constructor
     *
     */
    public function __construct(?string $project = null, ?string $logstore = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
    }

    public function getLogstore(): ?string {
        return $this->logstore;
    }

    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

}
