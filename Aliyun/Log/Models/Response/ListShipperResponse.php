<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class ListShipperResponse extends \Aliyun\Log\Models\Response {
    private int $count;

    private int $total;

    /** @var string[] */
    private array $shippers;

    /**
     * ListShipperResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = $resp['count'];
        $this->total = $resp['total'];
        $this->shippers = $resp['shipper'];
    }

    /**
     * Get count
     */
    public function getCount(): int {
        return $this->count;
    }

    /**
     * Get total
     */
    public function getTotal(): int {
        return $this->total;
    }

    /**
     * Get shipper names
     *
     * @return string[]
     */
    public function getShippers(): array {
        return $this->shippers;
    }
}
