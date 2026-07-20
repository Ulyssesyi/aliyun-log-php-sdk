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
    public function __construct(
        ?string $project = null,
        private ?string $logStore = null,
    ) {
        parent::__construct($project);
    }
    public function getLogStore(): ?string {
        return $this->logStore;
    }
}
