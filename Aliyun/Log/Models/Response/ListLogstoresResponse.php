<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListLogstores API from log service.
 *
 * @author log service dev
 */
class ListLogstoresResponse extends \Aliyun\Log\Models\Response {
    private int $count;

    /** @var string[] */
    private array $logstores;

    /**
     * ListLogstoresResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = $resp['total'];
        $this->logstores = $resp['logstores'];
    }

    /**
     * Get total count of logstores from the response
     */
    public function getCount(): int {
        return $this->count;
    }

    /**
     * Get all the logstores from the response
     *
     * @return string[]
     */
    public function getLogstores(): array {
        return $this->logstores;
    }
}
