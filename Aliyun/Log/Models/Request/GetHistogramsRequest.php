<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to get histograms of a query from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class GetHistogramsRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string|null logstore name
     */
    private $logstore;

    /**
     * @var string|null topic name of logs
     */
    private $topic;

    /**
     * @var int|null the begin time
     */
    private $from;

    /**
     * @var int|null the end time
     */
    private $to;

    /**
     * @var string|null user defined query
     */
    private $query;

    /**
     * GetHistogramsRequest constructor
     *
     * @param string $project
     *            project name
     * @param string $logstore
     *            logstore name
     * @param integer $from
     *            the begin time
     * @param integer $to
     *            the end time
     * @param string $topic
     *            topic name of logs
     * @param string $query
     *            user defined query
     */
    public function __construct($project = null, $logstore = null, $from = null, $to = null, $topic = null, $query = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->from = $from;
        $this->to = $to;
        $this->topic = $topic;
        $this->query = $query;
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
     * Get topic name
     *
     * @return string|null topic name
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
     * Get begin time
     *
     * @return int|null begin time
     */
    public function getFrom() {
        return $this->from;
    }

    /**
     * Set begin time
     *
     * @param integer $from
     *            begin time
     */
    public function setFrom($from): void {
        $this->from = $from;
    }

    /**
     * Get end time
     *
     * @return int|null end time
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * Set end time
     *
     * @param integer $to
     *            end time
     */
    public function setTo($to): void {
        $this->to = $to;
    }

    /**
     * Get user defined query
     *
     * @return string|null user defined query
     */
    public function getQuery() {
        return $this->query;
    }

    /**
     * Set user defined query
     *
     * @param string $query
     *            user defined query
     */
    public function setQuery($query): void {
        $this->query = $query;
    }
}
