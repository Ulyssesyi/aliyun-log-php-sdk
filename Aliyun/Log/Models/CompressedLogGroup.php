<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * CompressedLogGroup is compressed LogGroup,
 * LogGroup infomation please refer to LogGroup
 *
 * @author log service dev
 */
class CompressedLogGroup {
    /** uncompressed LogGroup size */
    protected ?int $uncompressedSize = null;
    protected mixed $compressedData;
    protected ?int $time;
    /** @var array<mixed>|null */
    protected ?array $contents;

    /**
     * @param int|null $time
     * @param array<mixed> $contents
     */
    public function __construct(?int $time = null, array $contents = []) {
        if (! $time) {
            $time = time();
        }
        $this->time = $time;
        $this->contents = $contents;
    }

}
