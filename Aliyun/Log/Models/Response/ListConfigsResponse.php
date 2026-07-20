<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListConfigs API from log service.
 *
 * @author log service dev
 */
class ListConfigsResponse extends Response {
    private int $total;

    /** @var string[] */
    private array $configs;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $totalVal = $resp['total'];
        $this->total = is_numeric($totalVal) ? (int) $totalVal : 0;
        $configsVal = $resp['configs'];
        $this->configs = is_array($configsVal) ? array_map(fn (mixed $v): string => is_string($v) ? $v : (is_scalar($v) ? (string) $v : ''), $configsVal) : [];
    }

    public function getSize(): int {
        return count($this->configs);
    }

    public function getTotal(): int {
        return $this->total;
    }

    /** @return string[] */
    public function getConfigs(): array {
        return $this->configs;
    }
}
