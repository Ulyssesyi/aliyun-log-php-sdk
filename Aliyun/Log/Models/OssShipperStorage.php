<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

abstract class OssShipperStorage {
    private mixed $format = null;

    public function getFormat(): mixed {
        return $this->format;
    }

    public function setFormat(mixed $format): void {
        $this->format = $format;
    }

    /** @return array<string, mixed> */
    abstract public function to_json_object(): array;
}
