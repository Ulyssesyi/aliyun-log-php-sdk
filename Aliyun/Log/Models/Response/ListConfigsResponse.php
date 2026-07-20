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
     * @param array<mixed> $resp
     * @param array<string, string> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->total = $resp['total'];
        $this->configs = $resp['configs'];
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
