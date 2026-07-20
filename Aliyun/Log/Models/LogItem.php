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
    /**
     * @var integer time of the log item, the default time if the now time.
     */
    private int $time;

    /**
     * @var array<string, string> the data of the log item, including many key/value pairs.
     */
    private array $contents;

    /**
     * LogItem cnostructor
     *
     * @param array<string, string> $contents
     *            the data of the log item, including many key/value pairs.
     * @param integer $time
     *            time of the log item, the default time if the now time.
     */
    public function __construct(?int $time = null, array $contents = []) {
        if (! $time) {
            $time = time();
        }
        $this->time = $time;
        $this->contents = $contents;
    }

    /**
     * Get log time
     *
     * @return integer log time
     */
    public function getTime(): int {
        return $this->time;
    }

    /**
     * Set log time
     *
     * @param integer $time
     *            log time
     */
    public function setTime(int $time): void {
        $this->time = $time;
    }

    /**
     * Get log contents
     *
     * @return array<string, string> log contents
     */
    public function getContents(): array {
        return $this->contents;
    }

    /**
     * Set log contents
     *
     * @param array<string, string> $contents
     *            log contents
     */
    public function setContents(array $contents): void {
        $this->contents = $contents;
    }

    /**
     * Add a key/value pair as log content to the log
     *
     * @param string $key
     *            log content key
     * @param string $value
     *            log content value
     */
    public function pushBack(string $key, string $value): void {
        $this->contents[$key] = $value;
    }
}
