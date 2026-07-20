<?php

namespace Aliyun\Log;

/**
 * Container for all response-related methods.
 */
class ResponseCore {
    /**
     * Stores the HTTP header information.
     */
    public $header;

    /**
     * Stores the SimpleXML response.
     */
    public $body;

    /**
     * Stores the HTTP response code.
     */
    public $status;

    /**
     * Constructs a new instance of this class.
     *
     * @param array  $header (Required) Associative array of HTTP headers (typically returned by <RequestCore::get_response_header()>).
     * @param string $body   (Required) XML-formatted response from AWS.
     * @param int    $status (Optional) HTTP response status code from the request.
     */
    public function __construct($header, $body, $status = null) {
        $this->header = $header;
        $this->body = $body;
        $this->status = $status;
    }

    /**
     * Did we receive the status code we expected?
     *
     * @param int|array $codes (Optional) The status code(s) to expect. Pass an int for a single acceptable value, or an array of ints for multiple acceptable values.
     *
     * @return bool Whether we received the expected status code or not.
     */
    public function isOK($codes = [200, 201, 204, 206]) {
        if (is_array($codes)) {
            return in_array($this->status, $codes);
        }

        return $this->status === $codes;
    }
}
