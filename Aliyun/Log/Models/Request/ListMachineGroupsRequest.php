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

class ListMachineGroupsRequest extends \Aliyun\Log\Models\Request {
    private ?string $groupName;

    private ?int $offset;

    private ?int $size;

    /**
     * ListMachineGroupsRequest Constructor
     *
     * @param string|null $groupName
     * @param int|null $offset
     * @param int|null $size
     */
    public function __construct(?string $groupName = null, ?int $offset = null, ?int $size = null) {
        $this->groupName = $groupName;
        $this->offset = $offset;
        $this->size = $size;
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
     * @return int|null
     */
    public function getOffset(): ?int {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     */
    public function setOffset(?int $offset): void {
        $this->offset = $offset;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int {
        return $this->size;
    }

    /**
     * @param int|null $size
     */
    public function setSize(?int $size): void {
        $this->size = $size;
    }
}
