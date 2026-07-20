<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListShards API from log service.
 *
 * @author log service dev
 */
class ListShardsResponse extends Response {
    /** @var int[] */
    private array $shardIds;

    /** @var Shard[] */
    private array $shards;

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->shardIds = [];
        $this->shards = [];
        foreach ($resp as $key => $value) {
            $this->shardIds[] = $value['shardID'];
            $this->shards[] = new Shard($value['shardID'], $value['status'], $value['inclusiveBeginKey'], $value['exclusiveEndKey'], $value['createTime']);
        }
    }

    /** @return int[] */
    public function getShardIds(): array {
        return $this->shardIds;
    }

    /** @return Shard[] */
    public function getShards(): array {
        return $this->shards;
    }
}
