<?php declare(strict_types=1);

namespace Aliyun\Log;

use Exception;

// message Log.Content
class Log_Content {
    /** @var array<string, array<mixed>>|null */
    private ?array $_unknown = null;

    public function __construct(mixed $in = null, int|null &$limit = PHP_INT_MAX) {
        if ($in !== null) {
            if (is_string($in)) {
                $fp = fopen('php://memory', 'r+b');
                if ($fp === false) {
                    throw new Exception('Failed to open memory stream');
                }
                fwrite($fp, $in);
                rewind($fp);
            } elseif (is_resource($in)) {
                $fp = $in;
            } else {
                throw new Exception('Invalid in parameter');
            }
            $this->read($fp, $limit);
        }
    }

    public function read(mixed $fp, int|null &$limit = PHP_INT_MAX): void {
        while (!feof($fp) && $limit > 0) {
            $tag = Protobuf::read_varint($fp, $limit);
            if ($tag === false) {
                break;
            }
            $wire  = $tag & 0x07;
            $field = $tag >> 3;
            switch ($field) {
                case 1:
                    assert($wire === 2);
                    $len = Protobuf::read_varint($fp, $limit);
                    if ($len === false) {
                        throw new Exception('Protobuf::read_varint returned false');
                    }
                    if ($len > 0) {
                        $tmp = fread($fp, $len);
                    } else {
                        $tmp = '';
                    }
                    if ($tmp === false) {
                        throw new Exception("fread($len) returned false");
                    }
                    $this->key_ = $tmp;
                    $limit -= $len;
                    break;
                case 2:
                    assert($wire === 2);
                    $len = Protobuf::read_varint($fp, $limit);
                    if ($len === false) {
                        throw new Exception('Protobuf::read_varint returned false');
                    }
                    if ($len > 0) {
                        $tmp = fread($fp, $len);
                    } else {
                        $tmp = '';
                    }
                    if ($tmp === false) {
                        throw new Exception("fread($len) returned false");
                    }
                    $this->value_ = $tmp;
                    $limit -= $len;
                    break;
                default:
                    $this->_unknown[$field . '-' . Protobuf::get_wiretype($wire)][] = Protobuf::read_field($fp, $wire, $limit);
            }
        }
        if (!$this->validateRequired()) {
            throw new Exception('Required fields are missing');
        }
    }

    public function write(mixed $fp): void {
        if (!$this->validateRequired()) {
            throw new Exception('Required fields are missing');
        }
        if (!is_null($this->key_)) {
            fwrite($fp, "\x0a");
            Protobuf::write_varint($fp, strlen($this->key_));
            fwrite($fp, $this->key_);
        }
        if (!is_null($this->value_)) {
            fwrite($fp, "\x12");
            Protobuf::write_varint($fp, strlen($this->value_));
            fwrite($fp, $this->value_);
        }
    }

    public function size(): int {
        $size = 0;
        if (!is_null($this->key_)) {
            $l = strlen($this->key_);
            $size += 1 + Protobuf::size_varint($l) + $l;
        }
        if (!is_null($this->value_)) {
            $l = strlen($this->value_);
            $size += 1 + Protobuf::size_varint($l) + $l;
        }
        return $size;
    }

    public function validateRequired(): bool {
        return true;
    }

    public function __toString(): string {
        return ''
             . Protobuf::toString('unknown', $this->_unknown)
             . Protobuf::toString('key_', $this->key_)
             . Protobuf::toString('value_', $this->value_);
    }

    // required string Key = 1;
    private ?string $key_ = null;
    public function getKey(): ?string {
        return $this->key_;
    }
    public function setKey(string $value): void {
        $this->key_ = $value;
    }

    // required string Value = 2;
    private ?string $value_ = null;
    public function getValue(): ?string {
        return $this->value_;
    }
    public function setValue(string $value): void {
        $this->value_ = $value;
    }

    // @@protoc_insertion_point(class_scope:Log.Content)
}
