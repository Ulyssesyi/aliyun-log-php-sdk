<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class Config_InputDetail {
    public ?string $filePattern = '';
    /** @var string[]|null */
    public ?array $key = [];
    public ?bool $localStorage = true;
    public ?string $logBeginRegex = '';
    public ?string $logPath = '';
    public ?string $logType = '';
    public ?string $regex = '';
    public ?string $timeFormat = '';
    /** @var string[]|null */
    public ?array $filterRegex = [];
    /** @var string[]|null */
    public ?array $filterKey = [];
    public ?string $topicFormat = 'none';

    /**
     * @param string[]|null $key
     * @param string[]|null $filterRegex
     * @param string[]|null $filterKey
     */
    public function __construct(
        ?string $filePattern = '',
        ?array $key = [],
        ?bool $localStorage = true,
        ?string $logBeginRegex = '',
        ?string $logPath = '',
        ?string $logType = '',
        ?string $regex = '',
        ?string $timeFormat = '',
        ?array $filterRegex = [],
        ?array $filterKey = [],
        ?string $topicFormat = 'none',
    ) {
        $this->filePattern = $filePattern;
        $this->key = $key;
        $this->localStorage = $localStorage;
        $this->logBeginRegex = $logBeginRegex;
        $this->logPath = $logPath;
        $this->logType = $logType;
        $this->regex = $regex;
        $this->timeFormat = $timeFormat;
        $this->filterRegex = $filterRegex;
        $this->filterKey = $filterKey;
        $this->topicFormat = $topicFormat;
    }

    /** @return array<string, mixed> */
    public function toArray(): array {
        $resArray = [];
        if ($this->filePattern !== null) {
            $resArray['filePattern'] = $this->filePattern;
        }
        if ($this->key !== null) {
            $resArray['key'] = $this->key;
        }
        if ($this->localStorage !== null) {
            $resArray['localStorage'] = $this->localStorage;
        }
        if ($this->logBeginRegex !== null) {
            $resArray['logBeginRegex'] = $this->logBeginRegex;
        }
        if ($this->logPath !== null) {
            $resArray['logPath'] = $this->logPath;
        }
        if ($this->logType !== null) {
            $resArray['logType'] = $this->logType;
        }
        if ($this->regex !== null) {
            $resArray['regex'] = $this->regex;
        }
        if ($this->timeFormat !== null) {
            $resArray['timeFormat'] = $this->timeFormat;
        }
        if ($this->filterRegex !== null) {
            $resArray['filterRegex'] = $this->filterRegex;
        }
        if ($this->filterKey !== null) {
            $resArray['filterKey'] = $this->filterKey;
        }
        if ($this->topicFormat !== null) {
            $resArray['topicFormat'] = $this->topicFormat;
        }
        return $resArray;
    }
}

class Config_OutputDetail {
    public ?string $projectName = '';
    public ?string $logstoreName = '';

    public function __construct(?string $projectName = '', ?string $logstoreName = '') {
        $this->projectName = $projectName;
        $this->logstoreName = $logstoreName;
    }
    /** @return array<string, mixed> */
    public function toArray(): array {
        $resArray = [];
        if ($this->projectName !== null) {
            $resArray['projectName'] = $this->projectName;
        }
        if ($this->logstoreName !== null) {
            $resArray['logstoreName'] = $this->logstoreName;
        }
        return $resArray;
    }
}

class Config {
    private ?string $configName = '';
    private ?string $inputType = '';
    private ?Config_InputDetail $inputDetail = null;
    private ?string $outputType = '';
    private ?Config_OutputDetail $outputDetail = null;

    private mixed $createTime = null;
    private mixed $lastModifyTime = null;

    public function __construct(
        ?string $configName = '',
        ?string $inputType = '',
        ?Config_InputDetail $inputDetail = null,
        ?string $outputType = '',
        ?Config_OutputDetail $outputDetail = null,
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
    public function getInputDetail(): ?Config_InputDetail {
        return $this->inputDetail;
    }
    public function setInputDetail(?Config_InputDetail $inputDetail): void {
        $this->inputDetail = $inputDetail;
    }
    public function getOutputType(): ?string {
        return $this->outputType;
    }
    public function setOutputType(?string $outputType): void {
        $this->outputType = $outputType;
    }
    public function getOutputDetail(): ?Config_OutputDetail {
        return $this->outputDetail;
    }
    public function setOutputDetail(?Config_OutputDetail $outputDetail): void {
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
        $inputDetail = new Config_InputDetail();
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

        $outputDetail = new Config_OutputDetail();
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
