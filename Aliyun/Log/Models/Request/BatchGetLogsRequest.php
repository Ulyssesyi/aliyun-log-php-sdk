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
    /**
     * @var string|null logstore name
     */
    private $logstore;

    /**
     * @var string|null shard ID
     */
    private $shardId;

    /**
     * @var int|null max line number of return logs
     */
    private $count;

    /**
     * @var string|null start cursor
     */
    private $cursor;

    /**
     * @var string|null end cursor
     */
    private $endCursor;

    /**
     * BatchGetLogsRequest Constructor
     *
     * @param string $project
     *            project name
     * @param string $logstore
     *            logstore name
     * @param string $shardId
     *            shard ID
     * @param integer $count
     *            return max loggroup numbers
     * @param string $cursor
     *            start cursor
     * @param string $end_cursor
     *            end cursor
     */
    public function __construct($project = null, $logstore = null, $shardId = null, $count = null, $cursor = null, $end_cursor = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->shardId = $shardId;
        $this->count = $count;
        $this->cursor = $cursor;
        $this->endCursor = $end_cursor;
    }

    /**
     * Get logstore name
     *
     * @return string|null logstore name
     */
    public function getLogstore() {
        return $this->logstore;
    }

    /**
     * Set logstore name
     *
     * @param string $logstore
     *            logstore name
     */
    public function setLogstore($logstore): void {
        $this->logstore = $logstore;
    }

    /**
     * Get shard ID
     *
     * @return string|null shardId
     */
    public function getShardId() {
        return $this->shardId;
    }

    /**
     * Set shard ID
     *
     * @param string $shardId
     *            shard ID
     */
    public function setShardId($shardId): void {
        $this->shardId = $shardId;
    }

    /**
     * Get max return loggroup number
     *
     * @return int|null count
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Set max return loggroup number
     *
     * @param integer $count
     *            max return loggroup number
     */
    public function setCount($count): void {
        $this->count = $count;
    }

    /**
     * Get start cursor
     *
     * @return string|null cursor
     */
    public function getCursor() {
        return $this->cursor;
    }

    /**
     * Get end cursor
     *
     * @return string|null cursor
     */
    public function getEndCursor() {
        return $this->endCursor;
    }

    /**
     * Set start cursor
     *
     * @param string $cursor
     *            start cursor
     */
    public function setCursor($cursor): void {
        $this->cursor = $cursor;
    }

    /**
     * Set end cursor
     *
     * @param string $cursor
     *            end cursor
     */
    public function setEndCursor($cursor): void {
        $this->endCursor = $cursor;
    }
}
