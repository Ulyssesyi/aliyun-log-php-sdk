<?php
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to get cursor by fromTime or begin/end mode
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class GetCursorRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string|null logstore name
     */
    private $logstore;

    /**
     * @var string|null shard id
     */
    private $shardId;

    /**
     * @var string|null value should be 'begin' or 'end'
     *         begin:return cursor point to first loggroup
     *         end:return cursor point to position after last loggroup
     *         if $mode is set to not null,$fromTime must be set null
     */
    private $mode;

    /**
     * @var int|null unix_timestamp
     *         return cursor point to first loggroup whose time after $fromTime
     */
    private $fromTime;

    /**
     * GetCursorRequest Constructor
     * @param string $project
     *            project name
     * @param string $logstore
     *            logstore name
     * @param string $shardId
     *            shard id
     * @param string|null $mode
     *            query mode,value must be 'begin' or 'end'
     * @param int $fromTime
     *            query by from time,unix_timestamp
     */
    public function __construct(string $project, string $logstore, string $shardId, ?string $mode = null, int $fromTime = -1) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->shardId = $shardId;
        $this->mode = $mode;
        $this->fromTime = $fromTime;
    }

    /**
     * Get logstore name
     *
     * @return string|null logstore name
     */
    public function getLogstore(): ?string {
        return $this->logstore;
    }

    /**
     * Set logstore name
     *
     * @param string|null $logstore
     *            logstore name
     */
    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    /**
     * Get shard id
     *
     * @return string|null shard id
     */
    public function getShardId(): ?string {
        return $this->shardId;
    }

    /**
     * Set shard id
     *
     * @param string|null $shardId
     *            shard id
     */
    public function setShardId(?string $shardId): void {
        $this->shardId = $shardId;
    }

    /**
     * Get mode
     *
     * @return string|null mode
     */
    public function getMode(): ?string {
        return $this->mode;
    }

    /**
     * Set mode
     *
     * @param string|null $mode
     *            value must be 'begin' or 'end'
     */
    public function setMode(?string $mode): void {
        $this->mode = $mode;
    }

    /**
     * Get from time
     *
     * @return int|null (unix_timestamp) from time
     */
    public function getFromTime(): ?int {
        return $this->fromTime;
    }

    /**
     * Set from time
     *
     * @param int|null $fromTime
     *            from time (unix_timestamp)
     */
    public function setFromTime(?int $fromTime): void {
        $this->fromTime = $fromTime;
    }

}
