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
    private ?string $logstore;

    private ?string $token;

    private ?int $line;

    /**
     * ListTopicsRequest constructor
     */
    public function __construct(?string $project = null, ?string $logstore = null, ?string $token = null, ?int $line = null) {
        parent::__construct($project);
        $this->logstore = $logstore;
        $this->token = $token;
        $this->line = $line;
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
     * Get start token to list topics
     */
    public function getToken(): ?string {
        return $this->token;
    }

    /**
     * Set start token to list topics
     */
    public function setToken(?string $token): void {
        $this->token = $token;
    }

    /**
     * Get max topic counts to return
     */
    public function getLine(): ?int {
        return $this->line;
    }

    /**
     * Set max topic counts to return
     */
    public function setLine(?int $line): void {
        $this->line = $line;
    }
}
