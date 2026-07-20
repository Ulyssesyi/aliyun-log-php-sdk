<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class UpdateShipperResponse extends \Aliyun\Log\Models\Response {
    /**
     * UpdateShipperResponse constructor
     *
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $header) {
        parent::__construct($header);
    }
}
