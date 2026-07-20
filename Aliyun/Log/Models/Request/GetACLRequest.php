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

class GetACLRequest extends \Aliyun\Log\Models\Request {
    private ?string $aclId;
    /**
     * GetACLRequest Constructor
     *
     */
    public function __construct(?string $aclId = null) {
        $this->aclId = $aclId;
    }
    public function getAclId(): ?string {
        return $this->aclId;
    }
    public function setAclId(?string $aclId): void {
        $this->aclId = $aclId;
    }
}
