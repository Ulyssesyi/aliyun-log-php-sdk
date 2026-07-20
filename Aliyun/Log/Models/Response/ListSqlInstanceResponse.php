<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListSqlInstance API from log service.
 *
 * @author log service dev
 */
class ListSqlInstanceResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var SqlInstance[] SQL instances
     */
    private $sqlInstances;

    /**
     * ListSqlInstanceResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $arr = $resp;
        if ($arr != null) {
            foreach ($arr as $data) {
                $name = $data['name'];
                $cu = $data['cu'];
                $createTime = $data['createTime'];
                $updateTime = $data['updateTime'];
                $this->sqlInstances[] = new SqlInstance($name, $cu, $createTime, $updateTime);
            }
        }
    }

    /**
     * Get SQL instances
     *
     * @return SqlInstance[]|null SQL instances
     */
    public function getSqlInstances() {
        return $this->sqlInstances;
    }
}
