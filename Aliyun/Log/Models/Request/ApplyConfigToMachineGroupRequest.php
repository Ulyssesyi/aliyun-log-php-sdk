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

use Aliyun\Log\Models\Request;

class ApplyConfigToMachineGroupRequest extends Request {
    public function __construct(
        private ?string $groupName = null,
        private ?string $configName = null,
    ) {
        parent::__construct();
    }

    public function getGroupName(): ?string {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): void {
        $this->groupName = $groupName;
    }

    public function getConfigName(): ?string {
        return $this->configName;
    }

    public function setConfigName(?string $configName): void {
        $this->configName = $configName;
    }

}
