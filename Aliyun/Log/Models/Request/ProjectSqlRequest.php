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
    public function __construct(
        ?string $project = null,
        private readonly ?string $query = null,
        /** if power sql is true, the query will be run with powered instance */
        private ?bool $powerSql = null,
    ) {
        parent::__construct($project);
    }

    public function getQuery(): ?string {
        return $this->query;
    }

    public function getPowerSql(): ?bool {
        return $this->powerSql;
    }

    public function setPowerSql(?bool $powerSql): void {
        $this->powerSql = $powerSql;
    }
}
