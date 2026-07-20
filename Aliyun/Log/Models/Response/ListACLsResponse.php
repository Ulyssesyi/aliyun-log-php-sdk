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
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $aclArr = [];
        $rawAcls = $resp['acls'] ?? [];
        if (is_array($rawAcls)) {
            foreach ($rawAcls as $value) {
                if (is_array($value)) {
                    $aclObj = new ACL();
                    $aclObj->setFromArray(array_filter($value, 'is_string', ARRAY_FILTER_USE_KEY));
                    $aclArr[] = $aclObj;
                }
            }
        }
        $this->acls = $aclArr;
    }

    /** @return ACL[] */
    public function getAcls(): array {
        return $this->acls;
    }
}
