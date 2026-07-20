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

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->offset = $resp['offset'];
        $this->size = $resp['size'];
        $this->machineGroups = $resp['machinegroups'];
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
