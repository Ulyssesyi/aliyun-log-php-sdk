<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the CreateACL API from log service.
 *
 * @author log service dev
 */
class CreateACLResponse extends Response {
    private string $aclId;

    /**
     * @param array $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $val = $resp['aclId'];
        $this->aclId = is_string($val) ? $val : '';
    }

    public function getAclId(): string {
        return $this->aclId;
    }
}
