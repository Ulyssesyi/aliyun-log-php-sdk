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
    private ?string $logstore;
    private ?string $topic;
    private ?string $source;

    /** @var LogItem[]|null */
    private ?array $logitems;

    private ?string $shardKey;

    /**
     * @param LogItem[]|null $logitems
     */
    public function __construct(?string $project = null, ?string $logstore = null, ?string $topic = null, ?string $source = null, ?array $logitems = null, ?string $shardKey = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->topic = $topic;
        $this->source = $source;
        $this->logitems = $logitems;
        $this->shardKey = $shardKey;
    }

    public function getLogstore(): ?string {
        return $this->logstore;
    }

    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
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
        $this -> shardKey = $key;
    }

    public function getShardKey(): ?string {
        return $this ->shardKey;
    }
}
