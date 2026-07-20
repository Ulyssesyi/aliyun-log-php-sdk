<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The base request of all log request.
 *
 * @author log service dev
 */
class Request {
    private ?string $project;

    public function __construct(?string $project = null) {
        $this->project = $project;
    }

    public function getProject(): ?string {
        return $this->project;
    }

    public function setProject(?string $project): void {
        $this->project = $project;
    }
}
