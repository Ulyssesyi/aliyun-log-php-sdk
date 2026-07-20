<?php declare(strict_types=1);

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to send data to log server.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\LogItem;
use Aliyun\Log\Models\Request;

class PutLogsRequest extends Request {
    public function __construct(
        ?string $project = null,
        private ?string $logStore = null,
        private ?string $topic = null,
        private ?string $source = null,
        /** @var LogItem[]|null */
        private ?array $logitems = null,
        private ?string $shardKey = null,
    ) {
        parent::__construct($project);
    }

    public function getLogStore(): ?string {
        return $this->logStore;
    }

    public function setLogStore(?string $logStore): void {
        $this->logStore = $logStore;
    }

    public function getTopic(): ?string {
        return $this->topic;
    }

    public function setTopic(?string $topic): void {
        $this->topic = $topic;
    }

    /**
     * @return LogItem[]|null
     */
    public function getLogItems(): ?array {
        return $this->logitems;
    }

    /**
     * @param LogItem[] $logitems
     */
    public function setLogItems(?array $logitems): void {
        $this->logitems = $logitems;
    }

    public function getSource(): ?string {
        return $this->source;
    }

    public function setSource(?string $source): void {
        $this->source = $source;
    }

    public function setShardKey(?string $key): void {
        $this->shardKey = $key;
    }

    public function getShardKey(): ?string {
        return $this->shardKey;
    }
}
