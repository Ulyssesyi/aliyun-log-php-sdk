<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetMachineGroup API from log service.
 *
 * @author log service dev
 */
class GetMachineGroupResponse extends \Aliyun\Log\Models\Response {
    private \Aliyun\Log\Models\MachineGroup $machineGroup;

    /**
     * GetMachineGroupResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->machineGroup = new \Aliyun\Log\Models\MachineGroup();
        $this->machineGroup->setFromArray($resp);
    }

    /**
     * Get MachineGroup from the response
     */
    public function getMachineGroup(): \Aliyun\Log\Models\MachineGroup {
        return $this->machineGroup;
    }
}
