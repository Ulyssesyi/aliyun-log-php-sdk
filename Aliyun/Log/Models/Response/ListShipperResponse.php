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

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = $resp['count'];
        $this->total = $resp['total'];
        $this->shippers = $resp['shipper'];
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
