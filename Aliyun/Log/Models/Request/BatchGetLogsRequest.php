<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to get logs by logstore and shardId from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class BatchGetLogsRequest extends Request {
    public function __construct(
        ?string $project = null,
        private ?string $logStore = null,
        private ?string $shardId = null,
        private ?int $count = null,
        private ?string $cursor = null,
        private ?string $endCursor = null,
    ) {
        parent::__construct($project);
    }

    public function getLogStore(): ?string {
        return $this->logStore;
    }

    public function setLogStore(?string $logStore): void {
        $this->logStore = $logStore;
    }

    public function getShardId(): ?string {
        return $this->shardId;
    }

    public function setShardId(?string $shardId): void {
        $this->shardId = $shardId;
    }

    public function getCount(): ?int {
        return $this->count;
    }

    public function setCount(?int $count): void {
        $this->count = $count;
    }

    public function getCursor(): ?string {
        return $this->cursor;
    }

    public function getEndCursor(): ?string {
        return $this->endCursor;
    }

    public function setCursor(?string $cursor): void {
        $this->cursor = $cursor;
    }

    public function setEndCursor(?string $endCursor): void {
        $this->endCursor = $endCursor;
    }
}
