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
    /**
     * @var integer uncompressed LogGroup size
     *
     */
    protected ?int $uncompressedSize = null;

    /**
     * @var mixed uncompressed LogGroup size
     *
     */
    protected mixed $compressedData;

    /**
     * @var int|null
     */
    protected ?int $time;

    /**
     * @var array<string, string>|null
     */
    protected ?array $contents;

    /**
     * @param array<string, string> $contents
     */
    public function __construct(?int $time = null, array $contents = []) {
        if (! $time) {
            $time = time();
        }
        $this->time = $time;
        $this->contents = $contents;
    }

}
