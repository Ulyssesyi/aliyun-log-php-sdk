<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to execute power sql  by a query from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class ProjectSqlRequest extends Request {
    private ?string $query;

    /** if power sql is true, the query will be run with powered instance */
    private ?bool $powerSql;

    public function __construct(?string $project = null, ?string $query = null, ?bool $powerSql = null) {
        parent::__construct($project);

        $this->query = $query;
        $this->powerSql = $powerSql;
    }

    public function getQuery(): ?string {
        return $this->query;
    }

    public function getPowerSql(): ?bool {
        return $this -> powerSql;
    }

    public function setPowerSql(?bool $powerSql): void {
        $this -> powerSql = $powerSql;
    }
}
