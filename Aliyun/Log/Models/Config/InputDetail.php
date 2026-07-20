<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Config;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class InputDetail {
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
