<?php declare(strict_types=1);
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

use Aliyun\Log\Models\MachineGroup;
use Aliyun\Log\Models\Request;

class CreateMachineGroupRequest extends Request {
    private ?MachineGroup $machineGroup;

    public function __construct(?MachineGroup $machineGroup = null) {
        parent::__construct();
        $this->machineGroup = $machineGroup;
    }

    public function getMachineGroup(): ?MachineGroup {
        return $this->machineGroup;
    }

    public function setMachineGroup(?MachineGroup $machineGroup): void {
        $this->machineGroup = $machineGroup;
    }

}
