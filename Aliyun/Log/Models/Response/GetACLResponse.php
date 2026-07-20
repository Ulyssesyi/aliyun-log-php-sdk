<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetACL API from log service.
 *
 * @author log service dev
 */
class GetACLResponse extends \Aliyun\Log\Models\Response {
    private ?\Aliyun\Log\Models\ACL $acl = null;

    /**
     * GetACLResponse constructor
     *
     * @param array<string, mixed>|null $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(mixed $resp, array $header) {
        parent::__construct($header);
        if ($resp !== null) {
            $this->acl = new \Aliyun\Log\Models\ACL();
            $this->acl->setFromArray($resp);
        }
    }

    /**
     * Get ACL from the response
     */
    public function getAcl(): ?\Aliyun\Log\Models\ACL {
        return $this->acl;
    }
}
