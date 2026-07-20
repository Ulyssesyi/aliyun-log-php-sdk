<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListMachineGroups API from log service.
 *
 * @author log service dev
 */
class ListMachineGroupsResponse extends Response {
    private int $offset;
    private int $size;

    /** @var string[] */
    private array $machineGroups;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);

        $offset = $resp['offset'];
        $this->offset = is_numeric($offset) ? (int) $offset : 0;

        $size = $resp['size'];
        $this->size = is_numeric($size) ? (int) $size : 0;

        $machineGroups = $resp['machinegroups'];
        $this->machineGroups = is_array($machineGroups) ? array_map(fn (mixed $v): string => is_string($v) ? $v : (is_scalar($v) ? (string) $v : ''), $machineGroups) : [];
    }

    public function getOffset(): int {
        return $this->offset;
    }

    public function getSize(): int {
        return $this->size;
    }

    /** @return string[] */
    public function getMachineGroups(): array {
        return $this->machineGroups;
    }
}
