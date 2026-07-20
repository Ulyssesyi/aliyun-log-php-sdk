<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListLogstores API from log service.
 *
 * @author log service dev
 */
class ListLogstoresResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int the number of total logstores from the response
     */
    private $count;

    /**
     * @var string[] all logstore
     */
    private $logstores;

    /**
     * ListLogstoresResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = $resp['total'];
        $this->logstores = $resp['logstores'];
    }

    /**
     * Get total count of logstores from the response
     *
     * @return int the number of total logstores from the response
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Get all the logstores from the response
     *
     * @return string[] all logstore
     */
    public function getLogstores() {
        return $this->logstores;
    }
}
