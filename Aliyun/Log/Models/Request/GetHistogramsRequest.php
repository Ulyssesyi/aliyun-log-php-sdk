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
    private ?string $logstore;

    private ?string $topic;

    private ?int $from;

    private ?int $to;

    private ?string $query;

    /**
     * GetHistogramsRequest constructor
     */
    public function __construct(?string $project = null, ?string $logstore = null, ?int $from = null, ?int $to = null, ?string $topic = null, ?string $query = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->from = $from;
        $this->to = $to;
        $this->topic = $topic;
        $this->query = $query;
    }

    /**
     * Get logstore name
     */
    public function getLogstore(): ?string {
        return $this->logstore;
    }

    /**
     * Set logstore name
     */
    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    /**
     * Get topic name
     */
    public function getTopic(): ?string {
        return $this->topic;
    }

    /**
     * Set topic name
     */
    public function setTopic(?string $topic): void {
        $this->topic = $topic;
    }

    /**
     * Get begin time
     */
    public function getFrom(): ?int {
        return $this->from;
    }

    /**
     * Set begin time
     */
    public function setFrom(?int $from): void {
        $this->from = $from;
    }

    /**
     * Get end time
     */
    public function getTo(): ?int {
        return $this->to;
    }

    /**
     * Set end time
     */
    public function setTo(?int $to): void {
        $this->to = $to;
    }

    /**
     * Get user defined query
     */
    public function getQuery(): ?string {
        return $this->query;
    }

    /**
     * Set user defined query
     */
    public function setQuery(?string $query): void {
        $this->query = $query;
    }
}
