<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListACLs API from log service.
 *
 * @author log service dev
 */
class ListACLsResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var \Aliyun\Log\Models\ACL[] ACL objects
     */
    private $acls;

    /**
     * ListACLsResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $aclArr = [];
        if (isset($resp['acls'])) {
            foreach ($resp['acls'] as $value) {
                $aclObj = new \Aliyun\Log\Models\ACL();
                $aclObj->setFromArray($value);
                $aclArr[] = $aclObj;
            }
        }
        $this->acls = $aclArr;
    }

    /**
     * Get ACLs from the response
     *
     * @return \Aliyun\Log\Models\ACL[] ACL objects
     */
    public function getAcls() {
        return $this->acls;
    }
}
