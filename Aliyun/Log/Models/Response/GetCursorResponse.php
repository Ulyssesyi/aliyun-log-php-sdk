<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetCursor API from log service.
 *
 * @author log service dev
 */
class GetCursorResponse extends Response {
    private string $cursor;

    /**
     * @param array $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $val = $resp['cursor'];
        $this->cursor = is_string($val) ? $val : '';
    }

    public function getCursor(): string {
        return $this->cursor;
    }
}
