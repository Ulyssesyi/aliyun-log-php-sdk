<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetCursor API from log service.
 *
 * @author log service dev
 */
class GetCursorResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var string cursor
     */
    private $cursor;

    /**
     * GetCursorResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->cursor = $resp['cursor'];
    }

    /**
     * Get cursor from the response
     *
     * @return string cursor
     */
    public function getCursor() {
        return $this->cursor;
    }
}
