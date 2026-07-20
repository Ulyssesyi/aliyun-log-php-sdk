<?php

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
    /**
     * @var array<string, string> HTTP response header
     */
    private $headers;

    /**
     * Response constructor
     *
     * @param array<string, string> $headers
     *            HTTP response header
     */
    public function __construct(array $headers) {
        $this->headers = $headers;
    }

    /**
     * Get all http headers
     *
     * @return array<string, string> HTTP response header
     */
    public function getAllHeaders(): array {
        return $this->headers;
    }

    /**
     * Get specified http header
     *
     * @param string $key
     *            key to get header
     *
     * @return string HTTP response header. '' will be return if not set.
     */
    public function getHeader(string $key): string {
        return $this->headers[$key] ?? '';
    }

    /**
     * Get the request id of the response. '' will be return if not set.
     *
     * @return string request id
     */
    public function getRequestId(): string {
        return $this->headers['x-log-requestid'] ?? '';
    }
}
