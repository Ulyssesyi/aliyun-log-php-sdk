<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListLogstores API from log service.
 *
 * @author log service dev
 */
class ListLogstoresResponse extends Response {
    private int $count;

    /** @var string[] */
    private array $logstores;

    /**
     * @param array<mixed> $resp
     * @param array<string, string> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = $resp['total'];
        $this->logstores = $resp['logstores'];
    }

    public function getCount(): int {
        return $this->count;
    }

    /** @return string[] */
    public function getLogstores(): array {
        return $this->logstores;
    }
}
