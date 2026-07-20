<?php declare(strict_types=1);

namespace Aliyun\Log;

/**
 * Base class for protocol buffer messages.
 * Subclasses implement read(), write(), size(), validateRequired(), and __toString().
 */
class ProtobufMessage {
    /**
     * Reads the message from a stream.
     * This method should be overridden in subclasses.
     *
     * @param resource $fp
     * @param int $limit
     */
    public function read($fp, &$limit = PHP_INT_MAX): void {
    }

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
        if ($in !== null) {
            if (is_string($in)) {
                // If the input is a string, turn it into a stream and decode it
                $str = $in;
                $fp = fopen('php://memory', 'r+b');
                fwrite($fp, $str);
                rewind($fp);
            } elseif (is_resource($in)) {
                $fp = $in;
            } else {
                throw new \Exception('Invalid in parameter');
            }
            $this->read($fp, $limit);
            if (isset($str)) {
                fclose($fp);
            }
        }
    }
}
