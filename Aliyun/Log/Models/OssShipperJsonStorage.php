<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class OssShipperJsonStorage extends OssShipperStorage {
    private bool $enableTag = false;

    public function isEnableTag(): bool {
        return $this->enableTag;
    }

    public function setEnableTag(bool $enableTag): void {
        $this->enableTag = $enableTag;
    }

    /** @return array<string, mixed> */
    public function to_json_object(): array {
        $detail =  [
            'enableTag' => $this->enableTag,
        ];
        return [
            'detail' => $detail,
            'format' => 'json',
        ];
    }
}
