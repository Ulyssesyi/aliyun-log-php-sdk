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

class GetMachineRequest extends \Aliyun\Log\Models\Request {
    private $uuid;

    /**
     * GetMachineRequest Constructor
     *
     */
    public function __construct($uuid = null) {
        $this->uuid = $uuid;
    }

    public function getUuid() {
        return $this->uuid;
    }

    public function setUuid($uuid): void {
        $this->uuid = $uuid;
    }

}
