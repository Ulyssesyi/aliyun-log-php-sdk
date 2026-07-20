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
     * @param array<mixed> $resp
     * @param array<string, string> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->cursor = $resp['cursor'];
    }

    public function getCursor(): string {
        return $this->cursor;
    }
}
