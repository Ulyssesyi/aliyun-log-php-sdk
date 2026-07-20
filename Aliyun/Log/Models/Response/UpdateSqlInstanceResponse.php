<?php
namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the UpdateSqlInstance API from log service.
 *
 * @author log service dev
 */
class UpdateSqlInstanceResponse extends \Aliyun\Log\Models\Response {
    
    /**
     * Aliyun_Log_Models_UpdateSqlInstanceResponse constructor
     *
     * @param array $resp
     *            UpdateSqlInstance HTTP response body
     * @param array $header
     *            UpdateSqlInstance HTTP response header
     */
    public function __construct($resp, $header) {
        parent::__construct ( $header );
    }
    
}
