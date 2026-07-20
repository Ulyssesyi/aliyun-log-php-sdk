<?php
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 *
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class GetACLRequest extends \Aliyun\Log\Models\Request {
    private $aclId;
    /**
     * GetACLRequest Constructor
     *
     */
    public function __construct($aclId = null) {
        $this->aclId = $aclId;
    }
    public function getAclId() {
        return $this->aclId;
    }
    public function setAclId($aclId): void {
        $this->aclId = $aclId;
    }
}
