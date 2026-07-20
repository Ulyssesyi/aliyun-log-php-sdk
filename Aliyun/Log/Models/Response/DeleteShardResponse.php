<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the DeleteShard API from log service.
 *
 * @author log service dev
 */
class DeleteShardResponse extends \Aliyun\Log\Models\Response {
    /**
     * DeleteShardResponse constructor
     *
     * @param array<string, string> $headers
     *            HTTP response header
     */
    public function __construct(array $headers) {
        parent::__construct($headers);
    }
}
