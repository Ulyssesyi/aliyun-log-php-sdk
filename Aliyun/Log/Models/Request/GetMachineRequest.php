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

class GetMachineRequest extends \Aliyun\Log\Models\Request {
    private ?string $uuid;

    /**
     * GetMachineRequest Constructor
     *
     */
    public function __construct(?string $uuid = null) {
        $this->uuid = $uuid;
    }

    public function getUuid(): ?string {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): void {
        $this->uuid = $uuid;
    }

}
