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
    protected $uncompressedSize;

    /**
     * @var integer uncompressed LogGroup size
     *
     */
    protected $compressedData;

    /**
     * @var int|null
     */
    protected $time;

    /**
     * @var array|null
     */
    protected $contents;

    public function __construct($time = null, $contents = null) {
        if (! $time) {
            $time = time();
        }
        $this->time = $time;
        if ($contents) {
            $this->contents = $contents;
        } else {
            $this->contents =  [];
        }
    }

}
