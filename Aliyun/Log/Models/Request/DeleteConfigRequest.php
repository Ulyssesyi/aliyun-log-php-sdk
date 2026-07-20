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

class DeleteConfigRequest extends \Aliyun\Log\Models\Request {
    private ?string $configName;
    /**
     * DeleteConfigRequest Constructor
     *
     */
    public function __construct(?string $configName = null) {
        $this->configName = $configName;
    }

    public function getConfigName(): ?string {
        return $this->configName;
    }

    public function setConfigName(?string $configName): void {
        $this->configName = $configName;
    }

}
