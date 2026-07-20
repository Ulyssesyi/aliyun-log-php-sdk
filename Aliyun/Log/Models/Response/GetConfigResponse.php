<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Config;
use Aliyun\Log\Models\Config\InputDetail;
use Aliyun\Log\Models\Config\OutputDetail;
use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the GetConfig API from log service.
 *
 * @author log service dev
 */
class GetConfigResponse extends Response {
    private Config $config;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->config = new Config();

        $configName = $resp['configName'] ?? null;
        $this->config->setConfigName(is_string($configName) ? $configName : null);

        $inputType = $resp['inputType'] ?? null;
        $this->config->setInputType(is_string($inputType) ? $inputType : null);

        $outputType = $resp['outputType'] ?? null;
        $this->config->setOutputType(is_string($outputType) ? $outputType : null);

        $rawInputDetail = $resp['inputDetail'] ?? null;
        $inputDetail = new InputDetail();
        if (is_array($rawInputDetail)) {
            $inputDetail->filePattern = is_string($rawInputDetail['filePattern'] ?? null) ? $rawInputDetail['filePattern'] : null;
            $inputDetail->key = is_array($rawInputDetail['key'] ?? null) ? array_map(fn(mixed $v): string => is_string($v) ? $v : '', $rawInputDetail['key']) : null;
            $inputDetail->localStorage = is_bool($rawInputDetail['localStorage'] ?? null) ? $rawInputDetail['localStorage'] : null;
            $inputDetail->logBeginRegex = is_string($rawInputDetail['logBeginRegex'] ?? null) ? $rawInputDetail['logBeginRegex'] : null;
            $inputDetail->logPath = is_string($rawInputDetail['logPath'] ?? null) ? $rawInputDetail['logPath'] : null;
            $inputDetail->logType = is_string($rawInputDetail['logType'] ?? null) ? $rawInputDetail['logType'] : null;
            $inputDetail->regex = is_string($rawInputDetail['regex'] ?? null) ? $rawInputDetail['regex'] : null;
            $inputDetail->timeFormat = is_string($rawInputDetail['timeFormat'] ?? null) ? $rawInputDetail['timeFormat'] : null;
            $inputDetail->filterRegex = is_array($rawInputDetail['filterRegex'] ?? null) ? array_map(fn(mixed $v): string => is_string($v) ? $v : '', $rawInputDetail['filterRegex']) : null;
            $inputDetail->filterKey = is_array($rawInputDetail['filterKey'] ?? null) ? array_map(fn(mixed $v): string => is_string($v) ? $v : '', $rawInputDetail['filterKey']) : null;
            $inputDetail->topicFormat = is_string($rawInputDetail['topicFormat'] ?? null) ? $rawInputDetail['topicFormat'] : null;
        }
        $this->config->setInputDetail($inputDetail);

        $rawOutputDetail = $resp['outputDetail'] ?? null;
        $outputDetail = new OutputDetail();
        if (is_array($rawOutputDetail)) {
            $outputDetail->projectName = is_string($rawOutputDetail['projectName'] ?? null) ? $rawOutputDetail['projectName'] : null;
            $outputDetail->logstoreName = is_string($rawOutputDetail['logstoreName'] ?? null) ? $rawOutputDetail['logstoreName'] : null;
        }
        $this->config->setOutputDetail($outputDetail);
    }

    public function getConfig(): Config {
        return $this->config;
    }
}
