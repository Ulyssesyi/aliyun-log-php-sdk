<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 *
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class UpdateConfigRequest extends Request {
    public function __construct(
        private mixed $config,
    ) {
    }

    public function getConfig(): mixed {
        return $this->config;
    }

    public function setConfig(mixed $config): void {
        $this->config = $config;
    }

}
