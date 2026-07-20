<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the CreateLogstore API from log service.
 *
 * @author log service dev
 */
class CreateLogstoreResponse extends \Aliyun\Log\Models\Response {
    /**
     * CreateLogstoreResponse constructor
     *
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $header) {
        parent::__construct($header);
    }

}
