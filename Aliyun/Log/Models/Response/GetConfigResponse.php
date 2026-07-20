<?php

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
    /**
     * @var \Aliyun\Log\Models\Config Config object
     */
    private $config;

    /**
     * GetConfigResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->config = new \Aliyun\Log\Models\Config();
        $this->config->setFromArray($resp);
    }

    /**
     * Get Config from the response
     *
     * @return \Aliyun\Log\Models\Config Config object
     */
    public function getConfig() {
        return $this->config;
    }
}
