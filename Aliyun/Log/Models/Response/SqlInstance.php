<?php

namespace Aliyun\Log\Models\Response;

/**
 * this class is used to represent the sql instance detail
 * for each sql instance, it contains name, cu, create time,update time
 * @author yunlei
 */

class SqlInstance {
    /**
     * @var string name
     */
    private $name;

    /**
     * @var int cu
     */
    private $cu;

    /**
     * @var int createTime
     */
    private $createTime;

    /**
     * @var int updateTime
     */
    private $updateTime;
    /**
     * SqlInstance constructor
     * @param string $name
     *                the name
     * @param int    $cu
     *                  cu
     * @param int    $createTime
     *                  create time
     * @param int    $updateTime
     *                  update time
     */
    public function __construct($name, $cu, $createTime, $updateTime) {
        $this->name = $name;
        $this->cu = $cu;
        $this->createTime = $createTime;
        $this->updateTime = $updateTime;
    }

    /**
     * Get name
     *
     * @return string name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get cu
     *
     * @return int cu
     */
    public function getCu() {
        return $this->cu;
    }

    /**
     * Get createTime
     *
     * @return int createTime
     */
    public function getCreateTime() {
        return $this->createTime;
    }

    /**
     * Get updateTime
     *
     * @return int updateTime
     */
    public function getUpdateTime() {
        return $this->updateTime;
    }
}
