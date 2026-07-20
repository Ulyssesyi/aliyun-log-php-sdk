<?php declare(strict_types=1);

namespace Aliyun\Log;

use Exception;

// message Log
class Log {
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
                    assert($wire === 0);
                    $time = Protobuf::read_varint($fp, $limit);
                    if ($time === false) {
                        throw new Exception('Protobuf::read_varint returned false');
                    }
                    $this->time_ = $time;
                    break;
                case 2:
                    assert($wire === 2);
                    $len = Protobuf::read_varint($fp, $limit);
                    if ($len === false) {
                        throw new Exception('Protobuf::read_varint returned false');
                    }
                    $limit -= $len;
                    $this->contents_[] = new Log_Content($fp, $len);
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

    public function write(mixed $fp): void {
        if (!$this->validateRequired()) {
            throw new Exception('Required fields are missing');
        }
        if (!is_null($this->time_)) {
            fwrite($fp, "\x08");
            Protobuf::write_varint($fp, $this->time_);
        }
        if (!is_null($this->contents_)) {
            foreach ($this->contents_ as $v) {
                fwrite($fp, "\x12");
                Protobuf::write_varint($fp, $v->size());
                $v->write($fp);
            }
        }
    }

    public function size(): int {
        $size = 0;
        if (!is_null($this->time_)) {
            $size += 1 + Protobuf::size_varint($this->time_);
        }
        if (!is_null($this->contents_)) {
            foreach ($this->contents_ as $v) {
                $l = $v->size();
                $size += 1 + Protobuf::size_varint($l) + $l;
            }
        }
        return $size;
    }

    public function validateRequired(): bool {
        if ($this->time_ === null) {
            return false;
        }
        return true;
    }

    public function __toString(): string {
        return ''
             . Protobuf::toString('unknown', $this->_unknown)
             . Protobuf::toString('time_', $this->time_)
             . Protobuf::toString('contents_', $this->contents_);
    }

    // required uint32 Time = 1;
    private ?int $time_ = null;
    public function getTime(): ?int {
        return $this->time_;
    }
    public function setTime(int $value): void {
        $this->time_ = $value;
    }

    // repeated .Log.Content contents = 2;
    /** @var Log_Content[]|null */
    private ?array $contents_ = null;
    public function clearContents(): void {
        $this->contents_ = null;
    }
    public function getContentsCount(): int {
        if ($this->contents_ === null) {
            return 0;
        }
        return count($this->contents_);
    }
    public function getContents(int $index): Log_Content {
        return $this->contents_[$index];
    }
    /** @return Log_Content[] */
    public function getContentsArray(): array {
        if ($this->contents_ === null) {
            return [];
        }
        return $this->contents_;
    }
    public function setContents(int $index, Log_Content $value): void {
        $this->contents_[$index] = $value;
    }
    public function addContents(Log_Content $value): void {
        $this->contents_[] = $value;
    }

    /** @param Log_Content[] $values */
    public function addAllContents(array $values): void {
        foreach ($values as $value) {
            $this->contents_[] = $value;
        }
    }

    // @@protoc_insertion_point(class_scope:Log)
}
