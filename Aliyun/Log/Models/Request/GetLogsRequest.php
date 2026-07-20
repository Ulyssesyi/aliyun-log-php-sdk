<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to get logs by a query from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class GetLogsRequest extends Request {
    public function __construct(
        ?string $project = null,
        private ?string $logStore = null,
        private ?int $from = null,
        private ?int $to = null,
        private ?string $topic = null,
        private ?string $query = null,
        private ?int $line = null,
        private ?int $offset = null,
        /** if reverse is set to true, the query will return the latest logs first */
        private ?bool $reverse = null,
        /** if power sql is true, the query will be run with powered instance */
        private ?bool $powerSql = null,
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

    public function getLine(): ?int {
        return $this->line;
    }

    public function setLine(?int $line): void {
        $this->line = $line;
    }

    public function getOffset(): ?int {
        return $this->offset;
    }

    public function setOffset(?int $offset): void {
        $this->offset = $offset;
    }

    public function getReverse(): ?bool {
        return $this->reverse;
    }

    public function setReverse(?bool $reverse): void {
        $this->reverse = $reverse;
    }

    public function getPowerSql(): ?bool {
        return $this->powerSql;
    }

    public function setPowerSql(?bool $powerSql): void {
        $this->powerSql = $powerSql;
    }
}
