<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Machine_Status {
    public ?string $binaryCurVersion = null;
    public ?string $binaryDeployVersion = null;

    public function __construct(?string $binaryCurVersion = null, ?string $binaryDeployVersion = null) {
        $this->binaryCurVersion = $binaryCurVersion;
        $this->binaryDeployVersion = $binaryDeployVersion;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array {
        $resArr = [];
        if ($this->binaryCurVersion !== null) {
            $resArr['binaryCurVersion'] = $this->binaryCurVersion;
        }
        if ($this->binaryDeployVersion !== null) {
            $resArr['binaryDeployVersion'] = $this->binaryDeployVersion;
        }
        return $resArr;
    }
}
