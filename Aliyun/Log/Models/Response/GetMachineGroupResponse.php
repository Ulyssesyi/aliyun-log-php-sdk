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
    /**
     * @var \Aliyun\Log\Models\MachineGroup MachineGroup object
     */
    private $machineGroup;

    /**
     * GetMachineGroupResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->machineGroup = new \Aliyun\Log\Models\MachineGroup();
        $this->machineGroup->setFromArray($resp);
    }

    /**
     * Get MachineGroup from the response
     *
     * @return \Aliyun\Log\Models\MachineGroup MachineGroup object
     */
    public function getMachineGroup() {
        return $this->machineGroup;
    }
}
