<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class MachineGroup_GroupAttribute {
    public ?string $externalName = null;
    public ?string $groupTopic = null;

    public function __construct(?string $externalName = null, ?string $groupTopic = null) {
        $this->externalName = $externalName;
        $this->groupTopic = $groupTopic;
    }

    /**
     * @return array<string, ?string>
     */
    public function toArray(): array {
        $resArray = [];
        if ($this->externalName !== null) {
            $resArray['externalName'] = $this->externalName;
        }
        if ($this->groupTopic !== null) {
            $resArray['groupTopic'] = $this->groupTopic;
        }
        return $resArray;
    }
}
