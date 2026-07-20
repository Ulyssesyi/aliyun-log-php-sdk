<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the CreateACL API from log service.
 *
 * @author log service dev
 */
class CreateACLResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var string ACL ID
     */
    private $aclId;

    /**
     * CreateACLResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->aclId = $resp['aclId'];
    }

    /**
     * Get ACL ID from the response
     *
     * @return string ACL ID
     */
    public function getAclId() {
        return $this->aclId;
    }
}
