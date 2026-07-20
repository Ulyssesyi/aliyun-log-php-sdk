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

use Aliyun\Log\Models\Request;

class LogStoreSqlRequest extends Request {
    private ?string $logstore;
    private ?int $from;
    private ?int $to;
    private ?string $query;
    private ?string $topic;

    /** if power sql is true, the query will be run with powered instance */
    private ?bool $powerSql;

    public function __construct(?string $project = null, ?string $logstore = null, ?int $from = null, ?int $to = null, ?string $topic = null, ?string $query = null, ?bool $powerSql = null) {
        parent::__construct($project);

        $this->logstore = $logstore;
        $this->from = $from;
        $this->to = $to;
        $this->topic = $topic;
        $this->query = $query;
        $this->powerSql = $powerSql;
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

    public function getFrom(): ?int {
        return $this->from;
    }

    public function setFrom(?int $from): void {
        $this->from = $from;
    }

    public function getTo(): ?int {
        return $this->to;
    }

    public function setTo(?int $to): void {
        $this->to = $to;
    }

    public function getQuery(): ?string {
        return $this->query;
    }

    public function setQuery(?string $query): void {
        $this->query = $query;
    }

    public function getPowerSql(): ?bool {
        return $this -> powerSql;
    }

    public function setPowerSql(?bool $powerSql): void {
        $this -> powerSql = $powerSql;
    }
}
