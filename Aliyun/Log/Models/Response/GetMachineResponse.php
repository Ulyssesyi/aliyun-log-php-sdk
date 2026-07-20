<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Machine;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetMachine API from log service.
 *
 * @author log service dev
 */
class GetMachineResponse extends Response {
    private Machine $machine;

    /**
     * @param array<mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->machine = new Machine();
        $this->machine->setFromArray($resp);
    }

    public function getMachine(): Machine {
        return $this->machine;
    }
}
