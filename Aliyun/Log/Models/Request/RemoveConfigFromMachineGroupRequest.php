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

class RemoveConfigFromMachineGroupRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string|null
     */
    private $groupName;

    /**
     * @var string|null
     */
    private $configName;

    /**
     * RemoveConfigFromMachineGroupRequest Constructor
     *
     * @param string|null $groupName
     * @param string|null $configName
     */
    public function __construct(?string $groupName = null, ?string $configName = null) {
        $this->groupName = $groupName;
        $this->configName = $configName;
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

    /**
     * @return string|null
     */
    public function getConfigName(): ?string {
        return $this->configName;
    }

    /**
     * @param string|null $configName
     */
    public function setConfigName(?string $configName): void {
        $this->configName = $configName;
    }

}
