<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

use Aliyun\Log\Models\Machine\Info;
use Aliyun\Log\Models\Machine\Status;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Machine {
    private ?string $uuid;
    private ?string $lastHeartbeatTime;
    private ?Info $info;
    private ?Status $status;

    private ?string $createTime;
    private ?string $lastModifyTime;

    public function __construct(
        ?string $uuid = null,
        ?string $lastHeartbeatTime = null,
        ?Info $info = null,
        ?Status $status = null,
        ?string $createTime = null,
        ?string $lastModifyTime = null,
    ) {
        $this->uuid = $uuid;
        $this->lastHeartbeatTime = $lastHeartbeatTime;
        $this->info = $info;
        $this->status = $status;

        $this->createTime = $createTime;
        $this->lastModifyTime = $lastModifyTime;
    }

    public function getUuid(): ?string {
        return $this->uuid;
    }
    public function setUuid(?string $uuid): void {
        $this->uuid = $uuid;
    }
    public function getLastHeartbeatTime(): ?string {
        return $this->lastHeartbeatTime;
    }
    public function setLastHeartbeatTime(?string $lastHeartbeatTime): void {
        $this->lastHeartbeatTime = $lastHeartbeatTime;
    }
    public function getInfo(): ?Info {
        return $this->info;
    }
    public function setInfo(?Info $info): void {
        $this->info = $info;
    }
    public function getStatus(): ?Status {
        return $this->status;
    }
    public function setStatus(?Status $status): void {
        $this->status = $status;
    }

    public function getCreateTime(): ?string {
        return $this->createTime;
    }
    public function setCreateTime(?string $createTime): void {
        $this->createTime = $createTime;
    }
    public function getLastModifyTime(): ?string {
        return $this->lastModifyTime;
    }
    public function setLastModifyTime(?string $lastModifyTime): void {
        $this->lastModifyTime = $lastModifyTime;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array {
        $resArr = [];
        if ($this->uuid !== null) {
            $resArr['uuid'] = $this->uuid;
        }
        if ($this->lastHeartbeatTime !== null) {
            $resArr['lastHeartbeatTime'] = $this->lastHeartbeatTime;
        }
        if ($this->info !== null) {
            $resArr['info'] = $this->info->toArray();
        }
        if ($this->status !== null) {
            $resArr['status'] = $this->status->toArray();
        }
        if ($this->createTime !== null) {
            $resArr['createTime'] = $this->createTime;
        }
        if ($this->lastModifyTime !== null) {
            $resArr['lastModifyTime'] = $this->lastModifyTime;
        }
        return $resArr;
    }

    /**
     * @param array<string, mixed> $resp
     */
    public function setFromArray(array $resp): void {
        $info = null;
        if (isset($resp['info']) && is_array($resp['info'])) {
            $infoArr = $resp['info'];
            $ip = (isset($infoArr['ip']) && is_string($infoArr['ip'])) ? $infoArr['ip'] : null;
            $os = (isset($infoArr['os']) && is_string($infoArr['os'])) ? $infoArr['os'] : null;
            $hostName = (isset($infoArr['hostName']) && is_string($infoArr['hostName'])) ? $infoArr['hostName'] : null;
            $info = new Info($ip, $os, $hostName);
        }
        $status = null;
        if (isset($resp['status']) && is_array($resp['status'])) {
            $statusArr = $resp['status'];
            $binaryCurVersion = (isset($statusArr['binaryCurVersion']) && is_string($statusArr['binaryCurVersion'])) ? $statusArr['binaryCurVersion'] : null;
            $binaryDeployVersion = (isset($statusArr['binaryDeployVersion']) && is_string($statusArr['binaryDeployVersion'])) ? $statusArr['binaryDeployVersion'] : null;
            $status = new Status($binaryCurVersion, $binaryDeployVersion);
        }
        $this->setUuid(isset($resp['uuid']) && is_string($resp['uuid']) ? $resp['uuid'] : null);
        $this->setLastHeartbeatTime(isset($resp['lastHeartbeatTime']) && is_string($resp['lastHeartbeatTime']) ? $resp['lastHeartbeatTime'] : null);
        $this->setInfo($info);
        $this->setStatus($status);
        $this->setCreateTime(isset($resp['createTime']) && is_string($resp['createTime']) ? $resp['createTime'] : null);
        $this->setLastModifyTime(isset($resp['lastModifyTime']) && is_string($resp['lastModifyTime']) ? $resp['lastModifyTime'] : null);
    }
}
