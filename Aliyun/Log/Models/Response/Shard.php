<?php

namespace Aliyun\Log\Models\Response;

/**
 * The class used to present the shard detail, for every shard ,it  contains id , status , begin Range, end range, createtime
 *
 * @author log service dev
 */
class Shard {
    /**
     * @var int the shard id
     */
    private $shardId;

    /**
     * @var string shard status (readwrite or readonly)
     */
    private $status;

    /**
     * @var string shard inclusive begin key
     */
    private $inclusiveBeginKey;

    /**
     * @var string shard exclusive begin key
     */
    private $exclusiveBeginKey;

    /**
     * @var string shard exclusive end key
     */
    private $exclusiveEndKey;

    /**
     * @var int shard create time
     */
    private $createTime;

    /**
     * Aliyun_Log_Models_Shard constructor
     *
     * @param int    $shardId
     *                  the shard id
     * @param string $status
     *                  the shard status
     * @param string $inclusiveBeginKey
     *                  the shard inclusive begin key
     * @param string $exclusiveEndKey
     *                  the shard exclusive end key
     * @param int    $createTime
     *                  the shard create time
     */
    public function __construct($shardId, $status, $inclusiveBeginKey, $exclusiveEndKey, $createTime) {
        $this->shardId = $shardId;
        $this->status = $status;
        $this->inclusiveBeginKey = $inclusiveBeginKey;
        $this->exclusiveBeginKey = $inclusiveBeginKey;
        $this->exclusiveEndKey = $exclusiveEndKey;
        $this->createTime = $createTime;
    }

    /**
     * Get the shardId
     *
     * @return int the shard id
     */
    public function getShardId() {
        return $this->shardId;
    }
    /**
     * Get the shard status
     *
     * @return string the shard status
     */
    public function getStatus() {
        return $this->status;
    }
    /**
     * Get the shard inclusive begin key
     *
     * @return string inclusive begin key
     */
    public function getInclusiveBeginKey() {
        return $this->inclusiveBeginKey;
    }
    /**
     * Get the shard exclusive begin key
     *
     * @return string exclusive begin key
     */
    public function getExclusiveBeginKey() {
        return $this->exclusiveBeginKey;
    }
    /**
     * Get the shard exclusive end key
     *
     * @return string exclusive end key
     */
    public function getExclusiveEndKey() {
        return $this->exclusiveEndKey;
    }
    /**
     * Get the shard create time
     *
     * @return int createTime
     */
    public function getCreateTime() {
        return $this->createTime;
    }
}
