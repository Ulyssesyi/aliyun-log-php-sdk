<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListSqlInstance API from log service.
 *
 * @author log service dev
 */
class ListSqlInstanceResponse extends Response {
    /** @var SqlInstance[] */
    private array $sqlInstances = [];

    /**
     * @param array<mixed> $resp
     * @param array<string, string> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        foreach ($resp as $data) {
            $this->sqlInstances[] = new SqlInstance($data['name'], (int) $data['cu'], (int) $data['createTime'], (int) $data['updateTime']);
        }
    }

    /** @return SqlInstance[] */
    public function getSqlInstances(): array {
        return $this->sqlInstances;
    }
}
