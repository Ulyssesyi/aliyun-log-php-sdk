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

class CreateMachineGroupRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var \Aliyun\Log\Models\MachineGroup|null
     */
    private $machineGroup;

    /**
     * CreateMachineGroupRequest Constructor
     *
     * @param \Aliyun\Log\Models\MachineGroup|null $machineGroup
     */
    public function __construct(?\Aliyun\Log\Models\MachineGroup $machineGroup = null) {
        $this->machineGroup = $machineGroup;
    }

    /**
     * @return \Aliyun\Log\Models\MachineGroup|null
     */
    public function getMachineGroup(): ?\Aliyun\Log\Models\MachineGroup {
        return $this->machineGroup;
    }

    /**
     * @param \Aliyun\Log\Models\MachineGroup|null $machineGroup
     */
    public function setMachineGroup(?\Aliyun\Log\Models\MachineGroup $machineGroup): void {
        $this->machineGroup = $machineGroup;
    }

}
