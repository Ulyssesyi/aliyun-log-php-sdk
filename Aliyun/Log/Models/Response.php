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
    /** @var array<string, mixed> */
    private array $headers;

    /**
     * @param array<string, mixed> $headers
     */
    public function __construct(array $headers) {
        $this->headers = $headers;
    }

    /**
     * @return array<string, mixed>
     */
    public function getAllHeaders(): array {
        return $this->headers;
    }

    public function getHeader(string $key): string {
        $value = $this->headers[$key] ?? '';
        return is_string($value) ? $value : '';
    }

    /**
     * '' will be returned if not set.
     */
    public function getRequestId(): string {
        $value = $this->headers['x-log-requestid'] ?? '';
        return is_string($value) ? $value : '';
    }
}
