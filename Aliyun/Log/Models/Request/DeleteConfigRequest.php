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
    private $configName;
    /**
     * DeleteConfigRequest Constructor
     *
     */
    public function __construct($configName = null) {
        $this->configName = $configName;
    }

    public function getConfigName() {
        return $this->configName;
    }

    public function setConfigName($configName): void {
        $this->configName = $configName;
    }

}
