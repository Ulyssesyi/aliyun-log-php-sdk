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

class CreateConfigRequest extends \Aliyun\Log\Models\Request {
    private mixed $config;

    /**
     * CreateConfigRequest Constructor
     *
     */
    public function __construct(mixed $config) {
        $this->config = $config;
    }

    public function getConfig(): mixed {
        return $this->config;

    }

    public function setConfig(mixed $config): void {
        $this->config = $config;
    }

}
