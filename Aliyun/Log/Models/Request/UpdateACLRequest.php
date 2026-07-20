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

class UpdateACLRequest extends \Aliyun\Log\Models\Request {

    private $acl;
    /**
     * UpdateACLRequest Constructor
     *
     */
    public function __construct($acl) {
        $this->acl = $acl;
    }

    public function getAcl(){
        return $this->acl;
    }
    public function setAcl($acl){
        $this->acl = $acl;
    }
}
