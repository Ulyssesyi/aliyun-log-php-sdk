<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * The class used to present the shard detail, for every shard ,it  contains id , status , begin Range, end range, createtime
 *
 * @author log service dev
 */
class Shard {
    private int $shardId;
    private string $status;
    private string $inclusiveBeginKey;
    private string $exclusiveBeginKey;
    private string $exclusiveEndKey;
    private int $createTime;

    public function __construct(int $shardId, string $status, string $inclusiveBeginKey, string $exclusiveEndKey, int $createTime) {
        $this->shardId = $shardId;
        $this->status = $status;
        $this->inclusiveBeginKey = $inclusiveBeginKey;
        $this->exclusiveBeginKey = $inclusiveBeginKey;
        $this->exclusiveEndKey = $exclusiveEndKey;
        $this->createTime = $createTime;
    }

    public function getShardId(): int {
        return $this->shardId;
    }
    public function getStatus(): string {
        return $this->status;
    }
    public function getInclusiveBeginKey(): string {
        return $this->inclusiveBeginKey;
    }
    public function getExclusiveBeginKey(): string {
        return $this->exclusiveBeginKey;
    }
    public function getExclusiveEndKey(): string {
        return $this->exclusiveEndKey;
    }
    public function getCreateTime(): int {
        return $this->createTime;
    }
}
