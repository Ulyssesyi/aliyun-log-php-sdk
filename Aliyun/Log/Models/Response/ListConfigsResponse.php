<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListConfigs API from log service.
 *
 * @author log service dev
 */
class ListConfigsResponse extends \Aliyun\Log\Models\Response {
    private int $total;

    /** @var string[] */
    private array $configs;

    /**
     * ListConfigsResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->total = $resp['total'];
        $this->configs = $resp['configs'];
    }

    /**
     * Get the number of configs returned
     */
    public function getSize(): int {
        return count($this->configs);
    }

    /**
     * Get total count of configs
     */
    public function getTotal(): int {
        return $this->total;
    }

    /**
     * Get configs from the response
     *
     * @return string[]
     */
    public function getConfigs(): array {
        return $this->configs;
    }
}
