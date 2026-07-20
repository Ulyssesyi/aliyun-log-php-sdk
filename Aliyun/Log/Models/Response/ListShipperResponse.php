<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class ListShipperResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int count
     */
    private $count;

    /**
     * @var int total
     */
    private $total;

    /**
     * @var string[] shipper names
     */
    private $shippers;

    /**
     * ListShipperResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = $resp['count'];
        $this->total = $resp['total'];
        $this->shippers = $resp['shipper'];
    }

    /**
     * Get count
     *
     * @return int count
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Get total
     *
     * @return int total
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * Get shipper names
     *
     * @return string[] shipper names
     */
    public function getShippers() {
        return $this->shippers;
    }
}
