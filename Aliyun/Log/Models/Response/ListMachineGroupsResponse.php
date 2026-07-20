<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListMachineGroups API from log service.
 *
 * @author log service dev
 */
class ListMachineGroupsResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int offset
     */
    private $offset;

    /**
     * @var int size
     */
    private $size;

    /**
     * @var string[] machine group names
     */
    private $machineGroups;

    /**
     * ListMachineGroupsResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->offset = $resp['offset'];
        $this->size = $resp['size'];
        $this->machineGroups = $resp['machinegroups'];
    }

    /**
     * Get offset
     *
     * @return int offset
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * Get size
     *
     * @return int size
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * Get machine groups
     *
     * @return string[] machine group names
     */
    public function getMachineGroups() {
        return $this->machineGroups;
    }
}
