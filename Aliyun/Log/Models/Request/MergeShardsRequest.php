<?php
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

class MergeShardsRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string|null
     */
    private $logstore;

    /**
     * @var string|null
     */
    private $shardId;

    /**
     * MergeShardsRequest Constructor
     *
     * @param string $project
     * @param string $logstore
     * @param string $shardId
     */
    public function __construct(string $project, string $logstore, string $shardId) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->shardId = $shardId;
    }

    /**
     * @return string|null
     */
    public function getLogstore(): ?string {
        return $this->logstore;
    }

    /**
     * @param string|null $logstore
     */
    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    /**
     * @return string|null
     */
    public function getShardId(): ?string {
        return $this->shardId;
    }
}
