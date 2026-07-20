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

class GetMachineGroupRequest extends \Aliyun\Log\Models\Request {
    private ?string $groupName;

    /**
     * GetMachineGroupRequest Constructor
     *
     * @param string|null $groupName
     */
    public function __construct(?string $groupName = null) {
        $this->groupName = $groupName;
    }

    /**
     * @return string|null
     */
    public function getGroupName(): ?string {
        return $this->groupName;
    }

    /**
     * @param string|null $groupName
     */
    public function setGroupName(?string $groupName): void {
        $this->groupName = $groupName;
    }

}
