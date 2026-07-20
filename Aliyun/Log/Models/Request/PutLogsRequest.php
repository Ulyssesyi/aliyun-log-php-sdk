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
    private $logstore;

    /**
     * @var string topic name
     */
    private $topic;

    /**
     * @var string source of the logs
     */
    private $source;

    /**
     * @var array LogItem array, log data
     */
    private $logitems;

    /**
     * @var string shardKey putlogs shard hash key
     */
    private $shardKey;

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
     * @param array $logitems
     *            LogItem array,log data
     */
    public function __construct($project = null, $logstore = null, $topic = null, $source = null, $logitems = null, $shardKey = null) {
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
     * Get topic name
     *
     * @return string topic name
     */
    public function getTopic() {
        return $this->topic;
    }

    /**
     * Set topic name
     *
     * @param string $topic
     *            topic name
     */
    public function setTopic($topic): void {
        $this->topic = $topic;
    }

    /**
     * Get all the log data
     *
     * @return array LogItem array, log data
     */
    public function getLogItems() {
        return $this->logitems;
    }

    /**
     * Set the log data
     *
     * @param array $logitems
     *            LogItem array, log data
     */
    public function setLogItems($logitems): void {
        $this->logitems = $logitems;
    }

    /**
     * Get log source
     *
     * @return string log source
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * set log source
     *
     * @param string $source
     *            log source
     */
    public function setSource($source): void {
        $this->source = $source;
    }
    /**
     * set shard key
     *
     * @param string $key
     */
    public function setShardKey($key): void {
        $this -> shardKey = $key;
    }
    /**
     * get shard key
     *
     * @return string shardKey
     */
    public function getShardKey() {
        return $this ->shardKey;
    }
}
