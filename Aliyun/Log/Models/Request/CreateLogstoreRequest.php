<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to create logstore from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class CreateLogstoreRequest extends Request {
    public function __construct(
        ?string $project = null,
        private ?string $logStore = null,
        private ?int $ttl = null,
        private ?int $shardCount = null,
    ) {
        parent::__construct($project);
    }
    public function getLogStore(): ?string {
        return $this->logStore;
    }
    public function getTtl(): ?int {
        return $this->ttl;
    }
    public function getShardCount(): ?int {
        return $this->shardCount;
    }
}
