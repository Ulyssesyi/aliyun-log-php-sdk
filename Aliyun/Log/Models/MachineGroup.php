<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

use Aliyun\Log\Models\MachineGroup\GroupAttribute;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class MachineGroup {
    private ?string $groupName;
    private ?string $groupType;
    private ?GroupAttribute $groupAttribute;
    /** @var array<int, Machine> */
    private ?array $machineList;

    private ?string $createTime = null;
    private ?string $lastModifyTime = null;

    /**
     * @param ?array<int, Machine> $machineList
     */
    public function __construct(
        ?string $groupName = '',
        ?string $groupType = '',
        ?GroupAttribute $groupAttribute = null,
        ?array $machineList = null,
        ?string $createTime = null,
        ?string $lastModifyTime = null,
    ) {
        $this->groupName = $groupName;
        $this->groupType = $groupType;
        $this->groupAttribute = $groupAttribute;
        $this->machineList = $machineList;
        $this->createTime = $createTime;
        $this->lastModifyTime = $lastModifyTime;
    }

    public function getGroupName(): ?string {
        return $this->groupName;
    }
    public function setGroupName(?string $groupName): void {
        $this->groupName = $groupName;
    }
    public function getGroupType(): ?string {
        return $this->groupType;
    }
    public function setGroupType(?string $groupType): void {
        $this->groupType = $groupType;
    }
    public function getGroupAttribute(): ?GroupAttribute {
        return $this->groupAttribute;
    }
    public function setGroupAttribute(?GroupAttribute $groupAttribute): void {
        $this->groupAttribute = $groupAttribute;
    }
    /**
     * @return ?array<int, Machine>
     */
    public function getMachineList(): ?array {
        return $this->machineList;
    }
    /**
     * @param ?array<int, Machine> $machineList
     */
    public function setMachineList(?array $machineList): void {
        $this->machineList = $machineList;
    }
    public function getCreateTime(): ?string {
        return $this->createTime;
    }
    public function setCreateTime(?string $createTime): void {
        $this->createTime = $createTime;
    }
    public function getLastModifyTime(): ?string {
        return $this->lastModifyTime;
    }
    public function setLastModifyTime(?string $lastModifyTime): void {
        $this->lastModifyTime = $lastModifyTime;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array {
        $format_array = [];
        if ($this->groupName !== null) {
            $format_array['groupName'] = $this->groupName;
        }
        if ($this->groupType !== null) {
            $format_array['groupType'] = $this->groupType;
        }
        if ($this->groupAttribute !== null) {
            $format_array['groupAttribute'] = $this->groupAttribute->toArray();
        }
        if ($this->machineList !== null) {
            $mlArr = [];
            foreach ($this->machineList as $value) {
                $mlArr[] = $value->toArray();
            }
            $format_array['machineList'] = $mlArr;
        }
        if ($this->createTime !== null) {
            $format_array['createTime'] = $this->createTime;
        }
        if ($this->lastModifyTime !== null) {
            $format_array['lastModifyTime'] = $this->lastModifyTime;
        }
        return $format_array;
    }

    /**
     * @param array<string, mixed> $resp
     */
    public function setFromArray(array $resp): void {
        $groupAttribute = null;
        if (isset($resp['groupAttribute']) && is_array($resp['groupAttribute'])) {
            $groupAttributeArr = $resp['groupAttribute'];
            $groupAttribute = new GroupAttribute();
            if (isset($groupAttributeArr['externalName']) && is_string($groupAttributeArr['externalName'])) {
                $groupAttribute->externalName = $groupAttributeArr['externalName'];
            }
            if (isset($groupAttributeArr['groupTopic']) && is_string($groupAttributeArr['groupTopic'])) {
                $groupAttribute->groupTopic = $groupAttributeArr['groupTopic'];
            }
        }
        $groupName = (isset($resp['groupName']) && is_string($resp['groupName'])) ? $resp['groupName'] : null;
        $groupType = (isset($resp['groupType']) && is_string($resp['groupType'])) ? $resp['groupType'] : null;
        $machineList = [];
        if (isset($resp['machineList']) && is_array($resp['machineList']) && count($resp['machineList']) > 0) {
            foreach ($resp['machineList'] as $value) {
                if (!is_array($value)) {
                    continue;
                }
                $cleanValue = array_filter($value, fn ($k) => is_string($k), ARRAY_FILTER_USE_KEY);
                $machine = new Machine();
                $machine->setFromArray($cleanValue);
                $machineList[] = $machine;
            }
        }

        $createTime = (isset($resp['createTime']) && is_string($resp['createTime'])) ? $resp['createTime'] : null;
        $lastModifyTime = (isset($resp['lastModifyTime']) && is_string($resp['lastModifyTime'])) ? $resp['lastModifyTime'] : null;
        $this->setGroupName($groupName);
        $this->setGroupType($groupType);
        $this->setGroupAttribute($groupAttribute);
        $this->setMachineList($machineList);
        $this->setCreateTime($createTime);
        $this->setLastModifyTime($lastModifyTime);
    }
}
