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
    public function __construct(
        ?string $project = null,
        private ?string $logStore = null,
        private ?int $from = null,
        private ?int $to = null,
        private ?string $topic = null,
        private ?string $query = null,
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
}
