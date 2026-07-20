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

class GetMachineGroupRequest extends Request {
    private ?string $groupName;

    public function __construct(?string $groupName = null) {
        parent::__construct();
        $this->groupName = $groupName;
    }

    public function getGroupName(): ?string {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): void {
        $this->groupName = $groupName;
    }

}
