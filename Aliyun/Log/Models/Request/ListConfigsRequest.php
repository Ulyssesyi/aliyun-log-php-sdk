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

class ListConfigsRequest extends \Aliyun\Log\Models\Request {
    private ?string $configName;
    private ?int $offset;
    private ?int $size;

    /**
     * ListConfigsRequest Constructor
     *
     */
    public function __construct(?string $configName = null, ?int $offset = null, ?int $size = null) {
        //parent::__construct ( $project );
        $this->configName = $configName;
        $this->offset = $offset;
        $this->size = $size;
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
