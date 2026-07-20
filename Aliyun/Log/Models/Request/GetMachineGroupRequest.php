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
    public function __construct(
        private ?string $groupName = null,
    ) {
        parent::__construct();
    }

    public function getGroupName(): ?string {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): void {
        $this->groupName = $groupName;
    }

}
