<?php declare(strict_types=1);

namespace Aliyun\Log;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The Exception of the log serivce request & response.
 *
 * @author log service dev
 */
class Exception extends \Exception {
    private string $requestId;

    public function __construct(string $code, string $message, string $requestId = '') {
        parent::__construct($message);
        $this->code = $code;
        $this->message = $message;
        $this->requestId = $requestId;
    }

    public function __toString(): string {
        return "Aliyun\\Log\\Exception: \n{\n    ErrorCode: $this->code,\n    ErrorMessage: $this->message\n    RequestId: $this->requestId\n}\n";
    }

    public function getErrorCode(): string {
        return $this->code;
    }

    public function getErrorMessage(): string {
        return $this->message;
    }

    /**
     * Get request id, '' is set if client or HTTP error.
     */
    public function getRequestId(): string {
        return $this->requestId;
    }
}
