<?php declare(strict_types=1);
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

use Aliyun\Log\Models\Request;

class GetCursorRequest extends Request {
    public function __construct(
        string $project,
        private ?string $logstore,
        private ?string $shardId,
        /** value should be 'begin' or 'end'. if set, $fromTime must be null */
        private ?string $mode = null,
        /** unix_timestamp: return cursor point to first loggroup after $fromTime */
        private ?int $fromTime = -1,
    ) {
        parent::__construct($project);
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

    public function getMode(): ?string {
        return $this->mode;
    }

    public function setMode(?string $mode): void {
        $this->mode = $mode;
    }

    public function getFromTime(): ?int {
        return $this->fromTime;
    }

    public function setFromTime(?int $fromTime): void {
        $this->fromTime = $fromTime;
    }

}
