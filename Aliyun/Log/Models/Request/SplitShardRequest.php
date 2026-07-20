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

use Aliyun\Log\Models\Request;

class SplitShardRequest extends Request {
    public function __construct(
        string $project,
        private ?string $logStore,
        private readonly string $shardId,
        private readonly string $midHash,
    ) {
        parent::__construct($project);
    }

    public function getLogStore(): ?string {
        return $this->logStore;
    }

    public function setLogStore(?string $logStore): void {
        $this->logStore = $logStore;
    }

    public function getShardId(): string {
        return $this->shardId;
    }

    public function getMidHash(): string {
        return $this->midHash;
    }

}
