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

use Aliyun\Log\Models\Request;

class ListTopicsRequest extends Request {
    private ?string $logstore;
    private ?string $token;
    private ?int $line;

    public function __construct(?string $project = null, ?string $logstore = null, ?string $token = null, ?int $line = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->token = $token;
        $this->line = $line;
    }

    public function getLogstore(): ?string {
        return $this->logstore;
    }

    public function setLogstore(?string $logstore): void {
        $this->logstore = $logstore;
    }

    public function getToken(): ?string {
        return $this->token;
    }

    public function setToken(?string $token): void {
        $this->token = $token;
    }

    public function getLine(): ?int {
        return $this->line;
    }

    public function setLine(?int $line): void {
        $this->line = $line;
    }
}
