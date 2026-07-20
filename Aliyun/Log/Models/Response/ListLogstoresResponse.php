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
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);

        $total = $resp['total'];
        $this->count = is_numeric($total) ? (int) $total : 0;

        $logstores = $resp['logstores'];
        $this->logstores = is_array($logstores) ? array_map(fn(mixed $v): string => is_string($v) ? $v : (is_scalar($v) ? (string) $v : ''), $logstores) : [];
    }

    public function getCount(): int {
        return $this->count;
    }

    /** @return string[] */
    public function getLogstores(): array {
        return $this->logstores;
    }
}
