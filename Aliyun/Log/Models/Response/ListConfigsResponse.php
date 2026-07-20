<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListConfigs API from log service.
 *
 * @author log service dev
 */
class ListConfigsResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int total number of configs
     */
    private $total;

    /**
     * @var string[] config names
     */
    private $configs;

    /**
     * ListConfigsResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->total = $resp['total'];
        $this->configs = $resp['configs'];
    }

    /**
     * Get the number of configs returned
     *
     * @return int number of configs
     */
    public function getSize() {
        return count($this->configs);
    }

    /**
     * Get total count of configs
     *
     * @return int total count
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * Get configs from the response
     *
     * @return string[] config names
     */
    public function getConfigs() {
        return $this->configs;
    }
}
