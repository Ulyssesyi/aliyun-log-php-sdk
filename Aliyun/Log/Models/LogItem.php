<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * LogItem used to present a log, it contains log time and multiple
 * key/value pairs to present the log contents.
 *
 * @author log service dev
 */
class LogItem {
    private int $time;

    public function __construct(
        ?int $time = null,
        /** @var array<string, string> */
        private array $contents = [],
    ) {
        if (! $time) {
            $time = time();
        }
        $this->time = $time;
    }

    public function getTime(): int {
        return $this->time;
    }

    public function setTime(int $time): void {
        $this->time = $time;
    }

    /** @return array<string, string> */
    public function getContents(): array {
        return $this->contents;
    }

    /** @param array<string, string> $contents */
    public function setContents(array $contents): void {
        $this->contents = $contents;
    }

    public function pushBack(string $key, string $value): void {
        $this->contents[$key] = $value;
    }
}
