<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetConfig API from log service.
 *
 * @author log service dev
 */
class GetConfigResponse extends \Aliyun\Log\Models\Response {
    private \Aliyun\Log\Models\Config $config;

    /**
     * GetConfigResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->config = new \Aliyun\Log\Models\Config();
        $this->config->setFromArray($resp);
    }

    /**
     * Get Config from the response
     */
    public function getConfig(): \Aliyun\Log\Models\Config {
        return $this->config;
    }
}
