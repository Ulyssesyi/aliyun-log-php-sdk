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

    public function __construct(string $name, int $cu, int $createTime, int $updateTime) {
        $this->name = $name;
        $this->cu = $cu;
        $this->createTime = $createTime;
        $this->updateTime = $updateTime;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCu(): int {
        return $this->cu;
    }

    public function getCreateTime(): int {
        return $this->createTime;
    }

    public function getUpdateTime(): int {
        return $this->updateTime;
    }
}
