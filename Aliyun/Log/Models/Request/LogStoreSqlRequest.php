<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to execute logstore sql by a query from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class LogStoreSqlRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string logstore name
     */
    private ?string $logstore;

    /**
     * @var integer the begin time
     */
    private ?int $from;

    /**
     * @var integer the end time
     */
    private ?int $to;

    /**
     * @var string user defined query
     */
    private ?string $query;

    /**
     * @var string|null topic
     */
    private ?string $topic;

    /**
     *
     * @var bool if power sql is true, then the query will be run with powered instance, which can handle large amountof data
     */
    private ?bool $powerSql;

    /**
     * GetLogsRequest Constructor
     *
     * @param string $project
     *            project name
     * @param string $logstore
     *            logstore name
     * @param integer $from
     *            the begin time
     * @param integer $to
     *            the end time
     * @param string $query
     *            user defined query
     * @param bool $powerSql
     *            whether use power sql to make sql faster
     */
    public function __construct(?string $project = null, ?string $logstore = null, ?int $from = null, ?int $to = null, ?string $topic = null, ?string $query = null, ?bool $powerSql = null) {
        parent::__construct($project);

        $this->logstore = $logstore;
        $this->from = $from;
        $this->to = $to;
        $this->topic = $topic;
        $this->query = $query;
        $this->powerSql = $powerSql;
    }

    /**
     * Get logstore name
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
     * Get topic
     *
     * @return string|null topic
     */
    public function getTopic(): ?string {
        return $this->topic;
    }

    /**
     * Get begin time
     *
     * @return integer begin time
     */
    public function getFrom(): ?int {
        return $this->from;
    }

    /**
     * Set begin time
     *
     * @param integer $from
     *            begin time
     */
    public function setFrom(?int $from): void {
        $this->from = $from;
    }

    /**
     * Get end time
     *
     * @return integer end time
     */
    public function getTo(): ?int {
        return $this->to;
    }

    /**
     * Set end time
     *
     * @param integer $to
     *            end time
     */
    public function setTo(?int $to): void {
        $this->to = $to;
    }

    /**
     * Get user defined query
     *
     * @return string user defined query
     */
    public function getQuery(): ?string {
        return $this->query;
    }

    /**
     * Set user defined query
     *
     * @param string $query
     *            user defined query
     */
    public function setQuery(?string $query): void {
        $this->query = $query;
    }

    /**
     * Get request powerSql flag
     *
     * @reutnr bool powerSql flag
     */
    public function getPowerSql(): ?bool {
        return $this -> powerSql;
    }

    /**
     *  Set request powerSql flag
     *
     *  @param bool $powerSql
     *               powerSql flag
     *
     */
    public function setPowerSql(?bool $powerSql): void {
        $this -> powerSql = $powerSql;
    }
}
