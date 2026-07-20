<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Config;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetConfig API from log service.
 *
 * @author log service dev
 */
class GetConfigResponse extends Response {
    private Config $config;

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->config = new Config();
        $this->config->setFromArray($resp);
    }

    public function getConfig(): Config {
        return $this->config;
    }
}
