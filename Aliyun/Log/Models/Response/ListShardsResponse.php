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

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->shardIds = [];
        $this->shards = [];
        foreach ($resp as $key => $value) {
            if (!is_array($value)) {
                continue;
            }
            $shardId = isset($value['shardID']) && is_numeric($value['shardID']) ? (int) $value['shardID'] : 0;
            $status = isset($value['status']) && is_string($value['status']) ? $value['status'] : '';
            $inclusiveBeginKey = isset($value['inclusiveBeginKey']) && is_string($value['inclusiveBeginKey']) ? $value['inclusiveBeginKey'] : '';
            $exclusiveEndKey = isset($value['exclusiveEndKey']) && is_string($value['exclusiveEndKey']) ? $value['exclusiveEndKey'] : '';
            $createTime = isset($value['createTime']) && is_numeric($value['createTime']) ? (int) $value['createTime'] : 0;

            $this->shardIds[] = $shardId;
            $this->shards[] = new Shard($shardId, $status, $inclusiveBeginKey, $exclusiveEndKey, $createTime);
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
