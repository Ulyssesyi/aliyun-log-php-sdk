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
    /**
     * @var \Aliyun\Log\Models\ACL|null ACL object
     */
    private $acl;

    /**
     * GetACLResponse constructor
     *
     * @param array<string, mixed>|null $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct($resp, array $header) {
        parent::__construct($header);
        $this->acl = null;
        if ($resp !== null) {
            $this->acl = new \Aliyun\Log\Models\ACL();
            $this->acl->setFromArray($resp);
        }
    }

    /**
     * Get ACL from the response
     *
     * @return \Aliyun\Log\Models\ACL|null ACL object
     */
    public function getAcl() {
        return $this->acl;
    }
}
