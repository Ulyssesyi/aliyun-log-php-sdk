<?php

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListShards API from log service.
 *
 * @author log service dev
 */
class ListShardsResponse extends \Aliyun\Log\Models\Response {
    /**
     * @var int[] shard IDs
     */
    private $shardIds;

    /**
     * @var Shard[] shard objects
     */
    private $shards;

    /**
     * ListShardsResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->shardIds = [];
        $this->shards = [];
        foreach ($resp as $key => $value) {
            $this->shardIds[] = $value['shardID'];
            $this->shards[] = new Shard($value['shardID'], $value['status'], $value['inclusiveBeginKey'], $value['exclusiveEndKey'], $value['createTime']);
        }
    }

    /**
     * Get shard IDs
     *
     * @return int[] shard IDs
     */
    public function getShardIds() {
        return $this->shardIds;
    }

    /**
     * Get shard objects
     *
     * @return Shard[] shard objects
     */
    public function getShards() {
        return $this->shards;
    }
}
