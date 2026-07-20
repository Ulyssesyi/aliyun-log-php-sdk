<?php

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class OssShipperJsonStorage extends OssShipperStorage {
    private $enableTag = false;

    /**
     * @return bool
     */
    public function isEnableTag(): bool {
        return $this->enableTag;
    }

    /**
     * @param bool $enableTag
     */
    public function setEnableTag(bool $enableTag): void {
        $this->enableTag = $enableTag;
    }

    public function to_json_object() {
        $detail =  [
            'enableTag' => $this->enableTag,
        ];
        return [
            'detail' => $detail,
            'format' => 'json',
        ];
    }
}
