<?php
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to get logs by a query from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

class GetProjectLogsRequest extends \Aliyun\Log\Models\Request {
    /**
     * @var string user defined query
     */
    private $query;
    /**
     * @var bool if power sql is true, then the query will be run with powered instance, which can handle large amountof data
     */
    private $powerSql;

    /**
     * GetProjectLogsRequest Constructor
     * @param string $query
     *            user defined query
     */
    public function __construct($project = null, $query = null, $powerSql = null) {
        parent::__construct($project);

        $this->query = $query;
        $this->powerSql = $powerSql;
    }

    /**
     * Get user defined query
     *
     * @return string user defined query
     */
    public function getQuery() {
        return $this->query;
    }

    /**
     * Get request powerSql flag
     *
     * @reutnr bool powerSql flag
     */
    public function getPowerSql() {
        return $this -> powerSql;
    }

    /**
     *  Set request powerSql flag
     *
     *  @param bool $powerSql
     *               powerSql flag
     *
     */
    public function setPowerSql($powerSql): void {
        $this -> powerSql = $powerSql;
    }

}
