<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Config_OutputDetail {
    public ?string $projectName = '';
    public ?string $logstoreName = '';

    public function __construct(?string $projectName = '', ?string $logstoreName = '') {
        $this->projectName = $projectName;
        $this->logstoreName = $logstoreName;
    }
    /** @return array<string, mixed> */
    public function toArray(): array {
        $resArray = [];
        if ($this->projectName !== null) {
            $resArray['projectName'] = $this->projectName;
        }
        if ($this->logstoreName !== null) {
            $resArray['logstoreName'] = $this->logstoreName;
        }
        return $resArray;
    }
}
