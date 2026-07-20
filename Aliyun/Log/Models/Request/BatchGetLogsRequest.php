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
    private ?string $logstore;
    private ?string $shardId;
    private ?int $count;
    private ?string $cursor;
    private ?string $endCursor;

    public function __construct(?string $project = null, ?string $logstore = null, ?string $shardId = null, ?int $count = null, ?string $cursor = null, ?string $end_cursor = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->shardId = $shardId;
        $this->count = $count;
        $this->cursor = $cursor;
        $this->endCursor = $end_cursor;
    }

    public function getLogstore(): ?string {
        return $this->logstore;
    }

    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
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
