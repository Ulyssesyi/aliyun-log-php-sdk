<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class ListShipperResponse extends Response {
    private int $count;
    private int $total;

    /** @var string[] */
    private array $shippers;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $count = $resp['count'] ?? 0;
        $this->count = is_numeric($count) ? (int) $count : 0;
        $total = $resp['total'] ?? 0;
        $this->total = is_numeric($total) ? (int) $total : 0;
        $shippers = $resp['shipper'] ?? [];
        $this->shippers = is_array($shippers) ? array_map(fn (mixed $v): string => is_string($v) ? $v : (is_scalar($v) ? (string) $v : ''), $shippers) : [];
    }

    public function getCount(): int {
        return $this->count;
    }

    public function getTotal(): int {
        return $this->total;
    }

    /** @return string[] */
    public function getShippers(): array {
        return $this->shippers;
    }
}
