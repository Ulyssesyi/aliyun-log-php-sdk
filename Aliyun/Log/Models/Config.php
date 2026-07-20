<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

use Aliyun\Log\Models\Config\InputDetail;
use Aliyun\Log\Models\Config\OutputDetail;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Config {
    private ?string $configName = '';
    private ?string $inputType = '';
    private ?InputDetail $inputDetail = null;
    private ?string $outputType = '';
    private ?OutputDetail $outputDetail = null;

    private mixed $createTime = null;
    private mixed $lastModifyTime = null;

    public function __construct(
        ?string $configName = '',
        ?string $inputType = '',
        ?InputDetail $inputDetail = null,
        ?string $outputType = '',
        ?OutputDetail $outputDetail = null,
        mixed $createTime = null,
        mixed $lastModifyTime = null,
    ) {
        $this->configName = $configName;
        $this->inputType = $inputType;
        $this->inputDetail = $inputDetail;
        $this->outputType = $outputType;
        $this->outputDetail = $outputDetail;
        $this->createTime = $createTime;
        $this->lastModifyTime = $lastModifyTime;

    }

    public function getConfigName(): ?string {
        return $this->configName;
    }
    public function setConfigName(?string $configName): void {
        $this->configName = $configName;
    }
    public function getInputType(): ?string {
        return $this->inputType;
    }
    public function setInputType(?string $inputType): void {
        $this->inputType = $inputType;
    }
    public function getInputDetail(): ?InputDetail {
        return $this->inputDetail;
    }
    public function setInputDetail(?InputDetail $inputDetail): void {
        $this->inputDetail = $inputDetail;
    }
    public function getOutputType(): ?string {
        return $this->outputType;
    }
    public function setOutputType(?string $outputType): void {
        $this->outputType = $outputType;
    }
    public function getOutputDetail(): ?OutputDetail {
        return $this->outputDetail;
    }
    public function setOutputDetail(?OutputDetail $outputDetail): void {
        $this->outputDetail = $outputDetail;
    }
    public function getCreateTime(): mixed {
        return $this->createTime;
    }
    public function setCreateTime(mixed $createTime): void {
        $this->createTime = $createTime;
    }

    public function getLastModifyTime(): mixed {
        return $this->lastModifyTime;
    }
    public function setLastModifyTime(mixed $lastModifyTime): void {
        $this->lastModifyTime = $lastModifyTime;
    }

    /** @return array<string, mixed> */
    public function toArray(): array {
        $format_array = [];
        if ($this->configName !== null) {
            $format_array['configName'] = $this->configName;
        }
        if ($this->inputType !== null) {
            $format_array['inputType'] = $this->inputType;
        }
        if ($this->inputDetail !== null) {
            $format_array['inputDetail'] = $this->inputDetail->toArray();
        }
        if ($this->outputType !== null) {
            $format_array['outputType'] = $this->outputType;
        }
        if ($this->outputDetail !== null) {
            $format_array['outputDetail'] = $this->outputDetail->toArray();
        }
        if ($this->createTime !== null) {
            $format_array['createTime'] = $this->createTime;
        }
        if ($this->lastModifyTime !== null) {
            $format_array['lastModifyTime'] = $this->lastModifyTime;
        }
        return $format_array;
    }

    /** @param array<string, mixed> $resp */
    public function setFromArray(array $resp): void {
        $inputDetail = new InputDetail();
        $inputDetail->filePattern = $resp['inputDetail']['filePattern'];
        $inputDetail->key = $resp['inputDetail']['key'];
        $inputDetail->localStorage = $resp['inputDetail']['localStorage'];
        $inputDetail->logBeginRegex = $resp['inputDetail']['logBeginRegex'];
        $inputDetail->logPath = $resp['inputDetail']['logPath'];
        $inputDetail->logType = $resp['inputDetail']['logType'];
        $inputDetail->regex = $resp['inputDetail']['regex'];
        $inputDetail->timeFormat = $resp['inputDetail']['timeFormat'];
        $inputDetail->filterRegex = $resp['inputDetail']['filterRegex'];
        $inputDetail->filterKey = $resp['inputDetail']['filterKey'];
        $inputDetail->topicFormat = $resp['inputDetail']['topicFormat'];

        $outputDetail = new OutputDetail();
        $outputDetail->projectName = $resp['outputDetail']['projectName'];
        $outputDetail->logstoreName = $resp['outputDetail']['logstoreName'];

        $configName = $resp['configName'];
        $inputType = $resp['inputType'];
        $outputType = $resp['outputType'];

        $this->setConfigName($configName);
        $this->setInputType($inputType);
        $this->setInputDetail($inputDetail);
        $this->setOutputType($outputType);
        $this->setOutputDetail($outputDetail);
    }
}
