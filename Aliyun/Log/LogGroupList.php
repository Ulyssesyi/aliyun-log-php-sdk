<?php declare(strict_types=1);

namespace Aliyun\Log;

use Exception;

// message LogGroupList
class LogGroupList {
    /** @var array<string, array<mixed>>|null */
    private ?array $_unknown = null;

    /**
     * @throws SDKException
     */
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

    /**
     * @param resource $fp
     * @param int|null $limit
     * @throws SDKException
     */
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
                    $limit -= $len;
                    $this->logGroupList_[] = new LogGroup($fp, $len);
                    assert($len === 0);
                    break;
                default:
                    $this->_unknown[$field . '-' . Protobuf::get_wiretype($wire)][] = Protobuf::read_field($fp, $wire, $limit);
            }
        }
        if (!$this->validateRequired()) {
            throw new Exception('Required fields are missing');
        }
    }

    /**
     * @param resource $fp
     * @throws SDKException
     */
    public function write(mixed $fp): void {
        if (!$this->validateRequired()) {
            throw new Exception('Required fields are missing');
        }
        if (!is_null($this->logGroupList_)) {
            foreach ($this->logGroupList_ as $v) {
                fwrite($fp, "\x0a");
                Protobuf::write_varint($fp, $v->size());
                $v->write($fp);
            }
        }
    }

    public function size(): int {
        $size = 0;
        if (!is_null($this->logGroupList_)) {
            foreach ($this->logGroupList_ as $v) {
                $l = $v->size();
                $size += 1 + Protobuf::size_varint($l) + $l;
            }
        }
        return $size;
    }

    public function validateRequired(): bool {
        return true;
    }

    public function __toString(): string {
        return ''
             . Protobuf::toString('unknown', $this->_unknown)
             . Protobuf::toString('logGroupList_', $this->logGroupList_);
    }

    // repeated .LogGroup logGroupList = 1;
    /** @var LogGroup[]|null */
    private ?array $logGroupList_ = null;
    public function clearLogGroupList(): void {
        $this->logGroupList_ = null;
    }
    public function getLogGroupListCount(): int {
        if ($this->logGroupList_ === null) {
            return 0;
        }
        return count($this->logGroupList_);
    }

    /**
     * @throws SDKException
     */
    public function getLogGroupList(int $index): LogGroup {
        if ($this->logGroupList_ === null) {
            throw new Exception('LogGroupList array is null');
        }
        return $this->logGroupList_[$index];
    }
    /** @return LogGroup[] */
    public function getLogGroupListArray(): array {
        if ($this->logGroupList_ === null) {
            return [];
        }
        return $this->logGroupList_;
    }
    public function setLogGroupList(int $index, LogGroup $value): void {
        $this->logGroupList_[$index] = $value;
    }
    public function addLogGroupList(LogGroup $value): void {
        $this->logGroupList_[] = $value;
    }

    /** @param LogGroup[] $values */
    public function addAllLogGroupList(array $values): void {
        foreach ($values as $value) {
            $this->logGroupList_[] = $value;
        }
    }

    // @@protoc_insertion_point(class_scope:LogGroupList)
}
