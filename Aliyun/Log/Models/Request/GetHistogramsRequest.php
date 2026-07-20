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

use Aliyun\Log\Models\Request;

class GetHistogramsRequest extends Request {
    private ?string $logstore;
    private ?string $topic;
    private ?int $from;
    private ?int $to;
    private ?string $query;

    public function __construct(?string $project = null, ?string $logstore = null, ?int $from = null, ?int $to = null, ?string $topic = null, ?string $query = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->from = $from;
        $this->to = $to;
        $this->topic = $topic;
        $this->query = $query;
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
}
