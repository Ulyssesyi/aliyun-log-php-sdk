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

class BatchGetLogsRequest extends \Aliyun\Log\Models\Request {
    private ?string $logstore;

    private ?string $shardId;

    private ?int $count;

    private ?string $cursor;

    private ?string $endCursor;

    /**
     * BatchGetLogsRequest Constructor
     */
    public function __construct(?string $project = null, ?string $logstore = null, ?string $shardId = null, ?int $count = null, ?string $cursor = null, ?string $end_cursor = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->shardId = $shardId;
        $this->count = $count;
        $this->cursor = $cursor;
        $this->endCursor = $end_cursor;
    }

    /**
     * Get logstore name
     */
    public function getLogstore(): ?string {
        return $this->logstore;
    }

    /**
     * Set logstore name
     */
    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    /**
     * Get shard ID
     */
    public function getShardId(): ?string {
        return $this->shardId;
    }

    /**
     * Set shard ID
     */
    public function setShardId(?string $shardId): void {
        $this->shardId = $shardId;
    }

    /**
     * Get max return loggroup number
     */
    public function getCount(): ?int {
        return $this->count;
    }

    /**
     * Set max return loggroup number
     */
    public function setCount(?int $count): void {
        $this->count = $count;
    }

    /**
     * Get start cursor
     */
    public function getCursor(): ?string {
        return $this->cursor;
    }

    /**
     * Get end cursor
     */
    public function getEndCursor(): ?string {
        return $this->endCursor;
    }

    /**
     * Set start cursor
     */
    public function setCursor(?string $cursor): void {
        $this->cursor = $cursor;
    }

    /**
     * Set end cursor
     */
    public function setEndCursor(?string $endCursor): void {
        $this->endCursor = $endCursor;
    }
}
