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

class SplitShardRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string|null
     */
    private $logstore;

    /**
     * @var string|null
     */
    private $shardId;

    /**
     * @var string|null
     */
    private $midHash;

    /**
     * SplitShardRequest Constructor
     *
     * @param string $project
     * @param string $logstore
     * @param string $shardId
     * @param string $midHash
     */
    public function __construct(string $project, string $logstore, string $shardId, string $midHash) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->shardId = $shardId;
        $this->midHash = $midHash;
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

    /**
     * @return string|null
     */
    public function getMidHash(): ?string {
        return $this->midHash;
    }

}
