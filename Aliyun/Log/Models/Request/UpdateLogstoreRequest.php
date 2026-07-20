<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to Update logstore from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class UpdateLogstoreRequest extends Request {
    private ?string $logstore;
    private ?int $ttl;
    private ?int $shardCount;

    public function __construct(?string $project = null, ?string $logstore = null, ?int $ttl = null, ?int $shardCount = null) {
        parent::__construct($project);
        $this -> logstore = $logstore;
        $this -> ttl = $ttl;
        $this -> shardCount = $shardCount;
    }
    public function getLogstore(): ?string {
        return $this -> logstore;
    }
    public function getTtl(): ?int {
        return $this -> ttl;
    }
    public function getShardCount(): ?int {
        return $this -> shardCount;
    }
}
