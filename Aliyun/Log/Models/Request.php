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
    public function __construct(private ?string $project = null) {
    }

    public function getProject(): ?string {
        return $this->project;
    }

    public function setProject(?string $project): void {
        $this->project = $project;
    }
}
