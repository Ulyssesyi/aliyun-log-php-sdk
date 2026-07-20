<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetLog API from log service.
 *
 * @author log service dev
 */
class CreateConfigResponse extends \Aliyun\Log\Models\Response {
    /**
     * CreateConfigResponse constructor
     *
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $header) {
        parent::__construct($header);
    }

}
