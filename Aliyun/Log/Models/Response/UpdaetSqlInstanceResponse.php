<?php
namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the CreateSqlInstance API from log service.
 *
 * @author log service dev
 */
class CreateSqlInstanceResponse extends \Aliyun\Log\Models\Response {
    
    /**
     * Aliyun_Log_Models_CreateSqlInstanceResponse constructor
     *
     * @param array $resp
     *            CreateSqlInstance HTTP response body
     * @param array $header
     *            CreateSqlInstance HTTP response header
     */
    public function __construct($resp, $header) {
        parent::__construct ( $header );
    }
    
}
