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

class ListConfigsRequest extends Request {
    public function __construct(
        private ?string $configName = null,
        private ?int $offset = null,
        private ?int $size = null,
    ) {
    }

    public function getConfigName(): ?string {
        return $this->configName;
    }

    public function setConfigName(?string $configName): void {
        $this->configName = $configName;
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
