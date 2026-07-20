<?php declare(strict_types=1);

namespace Aliyun\Log;

use Exception;

// message LogGroupList
class LogGroupList {
    private $_unknown;

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
        if ($in !== null) {
            if (is_string($in)) {
                $fp = fopen('php://memory', 'r+b');
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

    public function read($fp, &$limit = PHP_INT_MAX): void {
        while (!feof($fp) && $limit > 0) {
            $tag = Protobuf::read_varint($fp, $limit);
            if ($tag === false) {
                break;
            }
            $wire  = $tag & 0x07;
            $field = $tag >> 3;
            switch ($field) {
                case 1:
                    assert('$wire == 2');
                    $len = Protobuf::read_varint($fp, $limit);
                    if ($len === false) {
                        throw new Exception('Protobuf::read_varint returned false');
                    }
                    $limit -= $len;
                    $this->logGroupList_[] = new LogGroup($fp, $len);
                    assert('$len == 0');
                    break;
                default:
                    $this->_unknown[$field . '-' . Protobuf::get_wiretype($wire)][] = Protobuf::read_field($fp, $wire, $limit);
            }
        }
        if (!$this->validateRequired()) {
            throw new Exception('Required fields are missing');
        }
    }

    public function write($fp): void {
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

    public function size() {
        $size = 0;
        if (!is_null($this->logGroupList_)) {
            foreach ($this->logGroupList_ as $v) {
                $l = $v->size();
                $size += 1 + Protobuf::size_varint($l) + $l;
            }
        }
        return $size;
    }

    public function validateRequired() {
        return true;
    }

    public function __toString() {
        return ''
             . Protobuf::toString('unknown', $this->_unknown)
             . Protobuf::toString('logGroupList_', $this->logGroupList_);
    }

    // repeated .LogGroup logGroupList = 1;
    private $logGroupList_ = null;
    public function clearLogGroupList(): void {
        $this->logGroupList_ = null;
    }
    public function getLogGroupListCount() {
        if ($this->logGroupList_ === null) {
            return 0;
        }
        return count($this->logGroupList_);
    }
    public function getLogGroupList($index) {
        return $this->logGroupList_[$index];
    }
    public function getLogGroupListArray() {
        if ($this->logGroupList_ === null) {
            return [];
        }
        return $this->logGroupList_;
    }
    public function setLogGroupList($index, $value): void {
        $this->logGroupList_[$index] = $value;
    }
    public function addLogGroupList($value): void {
        $this->logGroupList_[] = $value;
    }
    public function addAllLogGroupList(array $values): void {
        foreach ($values as $value) {
            $this->logGroupList_[] = $value;
        }
    }

    // @@protoc_insertion_point(class_scope:LogGroupList)
}
