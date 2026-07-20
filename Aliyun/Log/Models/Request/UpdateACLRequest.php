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

class UpdateACLRequest extends Request {
    public function __construct(
        private mixed $acl,
    ) {
    }

    public function getAcl(): mixed {
        return $this->acl;
    }
    public function setAcl(mixed $acl): void {
        $this->acl = $acl;
    }
}
