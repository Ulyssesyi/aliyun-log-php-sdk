<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * this class is used to represent the sql instance detail
 * for each sql instance, it contains name, cu, create time,update time
 * @author yunlei
 */

class SqlInstance {
    private string $name;

    private int $cu;

    private int $createTime;

    private int $updateTime;

    /**
     * SqlInstance constructor
     */
    public function __construct(string $name, int $cu, int $createTime, int $updateTime) {
        $this->name = $name;
        $this->cu = $cu;
        $this->createTime = $createTime;
        $this->updateTime = $updateTime;
    }

    /**
     * Get name
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get cu
     */
    public function getCu(): int {
        return $this->cu;
    }

    /**
     * Get createTime
     */
    public function getCreateTime(): int {
        return $this->createTime;
    }

    /**
     * Get updateTime
     */
    public function getUpdateTime(): int {
        return $this->updateTime;
    }
}
