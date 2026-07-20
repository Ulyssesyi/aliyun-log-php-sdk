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

class DeleteMachineGroupRequest extends \Aliyun\Log\Models\Request {


    private $groupName; 
    /**
     * DeleteMachineGroupRequest Constructor
     *
     */
    public function __construct($groupName) {
        $this->groupName = $groupName;
    }

    public function getGroupName(){
        return $this->groupName;
    }

    public function setGroupName($groupName){
        $this->groupName = $groupName;
    }
    
}
