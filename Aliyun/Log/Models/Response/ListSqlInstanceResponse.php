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
     * @param array $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        foreach ($resp as $data) {
            $row = is_array($data) ? $data : [];
            $name = is_string($row['name'] ?? null) ? $row['name'] : '';
            $cu = is_numeric($row['cu'] ?? null) ? (int) $row['cu'] : 0;
            $createTime = is_numeric($row['createTime'] ?? null) ? (int) $row['createTime'] : 0;
            $updateTime = is_numeric($row['updateTime'] ?? null) ? (int) $row['updateTime'] : 0;
            $this->sqlInstances[] = new SqlInstance($name, $cu, $createTime, $updateTime);
        }
    }

    /** @return SqlInstance[] */
    public function getSqlInstances(): array {
        return $this->sqlInstances;
    }
}
