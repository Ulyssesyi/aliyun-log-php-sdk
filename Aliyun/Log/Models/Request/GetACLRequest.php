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

class GetACLRequest extends Request {
    public function __construct(
        private ?string $aclId = null,
    ) {
    }
    public function getAclId(): ?string {
        return $this->aclId;
    }
    public function setAclId(?string $aclId): void {
        $this->aclId = $aclId;
    }
}
