<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the PutLogs API from log service.
 *
 * @author log service dev
 */
class PutLogsResponse extends \Aliyun\Log\Models\Response {
    /**
     * PutLogsResponse constructor
     *
     * @param array<string, string> $headers
     *            HTTP response header
     */
    public function __construct(array $headers) {
        parent::__construct($headers);
    }
}
