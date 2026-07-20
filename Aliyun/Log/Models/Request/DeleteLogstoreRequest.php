<?php declare(strict_types=1);
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The request used to delete logstore from log service.
 *
 * @author log service dev
 */

namespace Aliyun\Log\Models\Request;

use Aliyun\Log\Models\Request;

class DeleteLogstoreRequest extends Request {
    private ?string $logstore;

    public function __construct(?string $project = null, ?string $logstore = null) {
        parent::__construct($project);
        $this -> logstore = $logstore;
    }
    public function getLogstore(): ?string {
        return $this -> logstore;
    }
}
