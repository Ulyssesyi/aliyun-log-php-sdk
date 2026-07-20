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
    private int $offset;

    private int $size;

    /** @var string[] */
    private array $machineGroups;

    /**
     * ListMachineGroupsResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->offset = $resp['offset'];
        $this->size = $resp['size'];
        $this->machineGroups = $resp['machinegroups'];
    }

    /**
     * Get offset
     */
    public function getOffset(): int {
        return $this->offset;
    }

    /**
     * Get size
     */
    public function getSize(): int {
        return $this->size;
    }

    /**
     * Get machine groups
     *
     * @return string[]
     */
    public function getMachineGroups(): array {
        return $this->machineGroups;
    }
}
