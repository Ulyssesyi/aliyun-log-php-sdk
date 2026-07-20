<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\MachineGroup;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetMachineGroup API from log service.
 *
 * @author log service dev
 */
class GetMachineGroupResponse extends Response {
    private MachineGroup $machineGroup;

    /**
     * @param array $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->machineGroup = new MachineGroup();
        $this->machineGroup->setFromArray($resp);
    }

    public function getMachineGroup(): MachineGroup {
        return $this->machineGroup;
    }
}
