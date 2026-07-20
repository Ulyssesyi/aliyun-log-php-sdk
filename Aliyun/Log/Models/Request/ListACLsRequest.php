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

class ListACLsRequest extends Request {
    public function __construct(
        private ?string $principleId = null,
        private ?int $offset = null,
        private ?int $size = null,
    ) {
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

    public function getPrincipleId(): ?string {
        return $this->principleId;
    }
    public function setPrincipleId(?string $principleId): void {
        $this->principleId = $principleId;
    }

}
