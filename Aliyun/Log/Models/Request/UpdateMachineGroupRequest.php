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

class UpdateMachineGroupRequest extends \Aliyun\Log\Models\Request {

    private $machineGroup; 
    /**
     * UpdateMachineGroupRequest Constructor
     *
     */
    public function __construct($machineGroup) {
        $this->machineGroup = $machineGroup;
    }

    public function getMachineGroup(){
        return $this->machineGroup;
    }

    public function setMachineGroup($machineGroup){
        $this->machineGroup = $machineGroup;
    }

    
}
