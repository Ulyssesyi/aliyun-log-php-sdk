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

class UpdateACLRequest extends \Aliyun\Log\Models\Request {
    private mixed $acl;
    /**
     * UpdateACLRequest Constructor
     *
     */
    public function __construct(mixed $acl) {
        $this->acl = $acl;
    }

    public function getAcl(): mixed {
        return $this->acl;
    }
    public function setAcl(mixed $acl): void {
        $this->acl = $acl;
    }
}
