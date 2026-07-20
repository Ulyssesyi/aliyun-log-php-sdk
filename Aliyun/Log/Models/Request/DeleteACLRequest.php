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

class DeleteACLRequest extends \Aliyun\Log\Models\Request {
    private $aclId;
    /**
     * DeleteACLRequest Constructor
     *
     */
    public function __construct($aclId = null) {
        $this->aclId = $aclId;
    }
    public function getAclId() {
        return $this->aclId;
    }
    public function setAclId($aclId) {
        $this->aclId = $aclId;
    }

}
