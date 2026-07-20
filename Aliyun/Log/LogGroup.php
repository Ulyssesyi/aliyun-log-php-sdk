<?php declare(strict_types=1);

namespace Aliyun\Log;

use Exception;

// message LogGroup
class LogGroup {
    /** @var array<string, array<mixed>>|null */
    private ?array $_unknown = null;

    public function __construct(mixed $in = null, int|null &$limit = PHP_INT_MAX) {
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
                    $this->logs_[] = new Log($fp, $len);
                    assert($len === 0);
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
                    $this->reserved_ = $tmp;
                    $limit -= $len;
                    break;
                case 3:
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
                    $this->topic_ = $tmp;
                    $limit -= $len;
                    break;
                case 4:
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
                    $this->source_ = $tmp;
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
        if (!is_null($this->logs_)) {
            foreach ($this->logs_ as $v) {
                fwrite($fp, "\x0a");
                Protobuf::write_varint($fp, $v->size());
                $v->write($fp);
            }
        }
        if (!is_null($this->reserved_)) {
            fwrite($fp, "\x12");
            Protobuf::write_varint($fp, strlen($this->reserved_));
            fwrite($fp, $this->reserved_);
        }
        if (!is_null($this->topic_)) {
            fwrite($fp, "\x1a");
            Protobuf::write_varint($fp, strlen($this->topic_));
            fwrite($fp, $this->topic_);
        }
        if (!is_null($this->source_)) {
            fwrite($fp, '"');
            Protobuf::write_varint($fp, strlen($this->source_));
            fwrite($fp, $this->source_);
        }
    }

    public function size(): int {
        $size = 0;
        if (!is_null($this->logs_)) {
            foreach ($this->logs_ as $v) {
                $l = $v->size();
                $size += 1 + Protobuf::size_varint($l) + $l;
            }
        }
        if (!is_null($this->reserved_)) {
            $l = strlen($this->reserved_);
            $size += 1 + Protobuf::size_varint($l) + $l;
        }
        if (!is_null($this->topic_)) {
            $l = strlen($this->topic_);
            $size += 1 + Protobuf::size_varint($l) + $l;
        }
        if (!is_null($this->source_)) {
            $l = strlen($this->source_);
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
             . Protobuf::toString('logs_', $this->logs_)
             . Protobuf::toString('reserved_', $this->reserved_)
             . Protobuf::toString('topic_', $this->topic_)
             . Protobuf::toString('source_', $this->source_);
    }

    // repeated .Log logs = 1;
    /** @var Log[]|null */
    private ?array $logs_ = null;
    public function clearLogs(): void {
        $this->logs_ = null;
    }
    public function getLogsCount(): int {
        if ($this->logs_ === null) {
            return 0;
        }
        return count($this->logs_);
    }
    public function getLogs(int $index): Log {
        return $this->logs_[$index];
    }
    /** @return Log[] */
    public function getLogsArray(): array {
        if ($this->logs_ === null) {
            return [];
        }
        return $this->logs_;
    }
    public function setLogs(int $index, Log $value): void {
        $this->logs_[$index] = $value;
    }
    public function addLogs(Log $value): void {
        $this->logs_[] = $value;
    }

    /** @param Log[] $values */
    public function addAllLogs(array $values): void {
        foreach ($values as $value) {
            $this->logs_[] = $value;
        }
    }

    // optional string reserved = 2;
    private ?string $reserved_ = null;
    public function getReserved(): ?string {
        return $this->reserved_;
    }
    public function setReserved(?string $value): void {
        $this->reserved_ = $value;
    }

    // optional string topic = 3;
    private ?string $topic_ = null;
    public function getTopic(): ?string {
        return $this->topic_;
    }
    public function setTopic(?string $value): void {
        $this->topic_ = $value;
    }

    // optional string source = 4;
    private ?string $source_ = null;
    public function getSource(): ?string {
        return $this->source_;
    }
    public function setSource(?string $value): void {
        $this->source_ = $value;
    }

    // @@protoc_insertion_point(class_scope:LogGroup)
}
