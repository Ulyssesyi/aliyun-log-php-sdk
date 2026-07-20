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

class DeleteShardRequest extends Request {
    public function __construct(
        string $project,
        private ?string $logstore,
        private string $shardId,
    ) {
        parent::__construct($project);
    }

    public function getLogstore(): ?string {
        return $this->logstore;
    }

    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    public function getShardId(): string {
        return $this->shardId;
    }
}
