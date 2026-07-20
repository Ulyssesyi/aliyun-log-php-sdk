<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\ACL;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListACLs API from log service.
 *
 * @author log service dev
 */
class ListACLsResponse extends Response {
    /** @var ACL[] */
    private array $acls;

    /**
     * @param array<mixed> $resp
     * @param array<string, string> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $aclArr = [];
        if (isset($resp['acls'])) {
            foreach ($resp['acls'] as $value) {
                $aclObj = new ACL();
                $aclObj->setFromArray($value);
                $aclArr[] = $aclObj;
            }
        }
        $this->acls = $aclArr;
    }

    /** @return ACL[] */
    public function getAcls(): array {
        return $this->acls;
    }
}
