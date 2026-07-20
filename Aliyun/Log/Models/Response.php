<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The base response class of all log response.
 *
 * @author log service dev
 */
class Response {
    /** @var array<string, string> */
    private array $headers;

    /**
     * @param array<string, string> $headers
     */
    public function __construct(array $headers) {
        $this->headers = $headers;
    }

    /**
     * @return array<string, string>
     */
    public function getAllHeaders(): array {
        return $this->headers;
    }

    public function getHeader(string $key): string {
        return $this->headers[$key] ?? '';
    }

    /**
     * '' will be returned if not set.
     */
    public function getRequestId(): string {
        return $this->headers['x-log-requestid'] ?? '';
    }
}
