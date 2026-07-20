<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The Request used to list topics from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class ListTopicsRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string $logstore logstore name
     */
    private $logstore;

    /**
     * @var string $token the start token to list topics
     */
    private $token;

    /**
     * @var integer $line max topic counts to return
     */
    private $line;

    /**
     * ListTopicsRequest constructor
     *
     * @param string $project project name
     * @param string $logstore logstore name
     * @param string $token the start token to list topics
     * @param integer $line max topic counts to return
     */
    public function __construct($project = null, $logstore = null, $token = null, $line = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->token = $token;
        $this->line = $line;
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
     * Get start token to list topics
     *
     * @return string start token to list topics
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * Set start token to list topics
     *
     * @param string $token start token to list topics
     */
    public function setToken($token): void {
        $this->token = $token;
    }

    /**
     * Get max topic counts to return
     *
     * @return integer max topic counts to return
     */
    public function getLine() {
        return $this->line;
    }

    /**
     * Set max topic counts to return
     *
     * @param integer $line max topic counts to return
     */
    public function setLine($line): void {
        $this->line = $line;
    }
}
