<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\ACL;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetACL API from log service.
 *
 * @author log service dev
 */
class GetACLResponse extends Response {
    private ?ACL $acl = null;

    /**
     * @param array<string, string> $header
     */
    public function __construct(mixed $resp, array $header) {
        parent::__construct($header);
        if ($resp !== null) {
            $this->acl = new ACL();
            $this->acl->setFromArray($resp);
        }
    }

    public function getAcl(): ?ACL {
        return $this->acl;
    }
}
