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

class PutLogsRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string logstore name
     */
    private ?string $logstore;

    /**
     * @var string topic name
     */
    private ?string $topic;

    /**
     * @var string source of the logs
     */
    private ?string $source;

    /**
     * @var \Aliyun\Log\Models\LogItem[] log data
     */
    private ?array $logitems;

    /**
     * @var string shardKey putlogs shard hash key
     */
    private ?string $shardKey;

    /**
     * PutLogsRequest cnstructor
     *
     * @param string $project
     *            project name
     * @param string $logstore
     *            logstore name
     * @param string $topic
     *            topic name
     * @param string $source
     *            source of the log
     * @param \Aliyun\Log\Models\LogItem[] $logitems
     *            LogItem array,log data
     */
    public function __construct(?string $project = null, ?string $logstore = null, ?string $topic = null, ?string $source = null, ?array $logitems = null, ?string $shardKey = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->topic = $topic;
        $this->source = $source;
        $this->logitems = $logitems;
        $this->shardKey = $shardKey;
    }

    /**
     * Get logstroe name
     *
     * @return string logstore name
     */
    public function getLogstore(): ?string {
        return $this->logstore;
    }

    /**
     * Set logstore name
     *
     * @param string $logstore
     *            logstore name
     */
    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    /**
     * Get topic name
     *
     * @return string topic name
     */
    public function getTopic(): ?string {
        return $this->topic;
    }

    /**
     * Set topic name
     *
     * @param string $topic
     *            topic name
     */
    public function setTopic(?string $topic): void {
        $this->topic = $topic;
    }

    /**
     * Get all the log data
     *
     * @return \Aliyun\Log\Models\LogItem[] log data
     */
    public function getLogItems(): ?array {
        return $this->logitems;
    }

    /**
     * Set the log data
     *
     * @param \Aliyun\Log\Models\LogItem[] $logitems
     *            LogItem array, log data
     */
    public function setLogItems(?array $logitems): void {
        $this->logitems = $logitems;
    }

    /**
     * Get log source
     *
     * @return string log source
     */
    public function getSource(): ?string {
        return $this->source;
    }

    /**
     * set log source
     *
     * @param string $source
     *            log source
     */
    public function setSource(?string $source): void {
        $this->source = $source;
    }
    /**
     * set shard key
     *
     * @param string $key
     */
    public function setShardKey(?string $key): void {
        $this -> shardKey = $key;
    }
    /**
     * get shard key
     *
     * @return string shardKey
     */
    public function getShardKey(): ?string {
        return $this ->shardKey;
    }
}
