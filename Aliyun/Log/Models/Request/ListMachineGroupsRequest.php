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

class ListMachineGroupsRequest extends Request {
    private ?string $groupName;
    private ?int $offset;
    private ?int $size;

    public function __construct(?string $groupName = null, ?int $offset = null, ?int $size = null) {
        parent::__construct();
        $this->groupName = $groupName;
        $this->offset = $offset;
        $this->size = $size;
    }

    public function getGroupName(): ?string {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): void {
        $this->groupName = $groupName;
    }

    public function getOffset(): ?int {
        return $this->offset;
    }

    public function setOffset(?int $offset): void {
        $this->offset = $offset;
    }

    public function getSize(): ?int {
        return $this->size;
    }

    public function setSize(?int $size): void {
        $this->size = $size;
    }
}
