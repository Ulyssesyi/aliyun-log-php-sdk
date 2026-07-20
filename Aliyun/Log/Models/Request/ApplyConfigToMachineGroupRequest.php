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

class ApplyConfigToMachineGroupRequest extends \Aliyun\Log\Models\Request {
    private $groupName;
    private $configName; 
    /**
     * ApplyConfigToMachineGroupRequest Constructor
     *
     */
    public function __construct($groupName=null,$configName=null) {
        $this->groupName = $groupName;
        $this->configName = $configName;
    }
    public function getGroupName(){
        return $this->groupName;
    }
    public function setGroupName($groupName){
        $this->groupName = $groupName;
    }

    public function getConfigName(){
        return $this->configName;
    }
    public function setConfigName($configName){
        $this->configName = $configName;
    }
    
}
