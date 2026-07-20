<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetMachine API from log service.
 *
 * @author log service dev
 */
class GetMachineResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var \Aliyun\Log\Models\Machine Machine object
     */
    private $machine;

    /**
     * GetMachineResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->machine = new \Aliyun\Log\Models\Machine();
        $this->machine->setFromArray($resp);
    }

    /**
     * Get Machine from the response
     *
     * @return \Aliyun\Log\Models\Machine Machine object
     */
    public function getMachine() {
        return $this->machine;
    }
}
