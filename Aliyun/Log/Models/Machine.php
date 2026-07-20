<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class Machine_Info {
    public ?string $ip = null;
    public ?string $os = null;
    public ?string $hostName = null;

    public function __construct(?string $ip = null, ?string $os = null, ?string $hostName = null) {
        $this->ip = $ip;
        $this->os = $os;
        $this->hostName = $hostName;
    }

    public function getIp(): ?string {
        return $this->ip;
    }
    public function setIp(?string $ip): void {
        $this->ip = $ip;
    }

    public function getOs(): ?string {
        return $this->os;
    }
    public function setOs(?string $os): void {
        $this->os = $os;
    }

    public function getHostName(): ?string {
        return $this->hostName;
    }
    public function setHostName(?string $hostname): void {
        $this->hostName = $hostname;
    }
    /**
     * @return array<string, string>
     */
    public function toArray(): array {
        $resArr = [];
        if ($this->ip !== null) {
            $resArr['ip'] = $this->ip;
        }
        if ($this->os !== null) {
            $resArr['os'] = $this->os;
        }
        if ($this->hostName !== null) {
            $resArr['hostName'] = $this->hostName;
        }
        return $resArr;
    }
}

class Machine_Status {
    public ?string $binaryCurVersion = null;
    public ?string $binaryDeployVersion = null;

    public function __construct(?string $binaryCurVersion = null, ?string $binaryDeployVersion = null) {
        $this->binaryCurVersion = $binaryCurVersion;
        $this->binaryDeployVersion = $binaryDeployVersion;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array {
        $resArr = [];
        if ($this->binaryCurVersion !== null) {
            $resArr['binaryCurVersion'] = $this->binaryCurVersion;
        }
        if ($this->binaryDeployVersion !== null) {
            $resArr['binaryDeployVersion'] = $this->binaryDeployVersion;
        }
        return $resArr;
    }
}

class Machine {
    private ?string $uuid = null;
    private ?string $lastHeartbeatTime = null;
    private ?Machine_Info $info = null;
    private ?Machine_Status $status = null;

    private ?string $createTime = null;
    private ?string $lastModifyTime = null;

    public function __construct(
        ?string $uuid = null,
        ?string $lastHeartbeatTime = null,
        ?Machine_Info $info = null,
        ?Machine_Status $status = null,
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
    public function getInfo(): ?Machine_Info {
        return $this->info;
    }
    public function setInfo(?Machine_Info $info): void {
        $this->info = $info;
    }
    public function getStatus(): ?Machine_Status {
        return $this->status;
    }
    public function setStatus(?Machine_Status $status): void {
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
        if (isset($resp['info'])) {
            $ip = (isset($resp['info']['ip'])) ? $resp['info']['ip'] : null;
            $os = (isset($resp['info']['os'])) ? $resp['info']['os'] : null;
            $hostName = (isset($resp['info']['hostName'])) ? $resp['info']['hostName'] : null;
            $info = new Machine_Info($ip, $os, $hostName);
        }
        $status = null;
        if (isset($resp['status'])) {
            $binaryCurVersion = (isset($resp['status']['binaryCurVersion'])) ? $resp['status']['binaryCurVersion'] : null;
            $binaryDeployVersion = (isset($resp['status']['binaryDeployVersion'])) ? $resp['status']['binaryDeployVersion'] : null;
            $status = new Machine_Status($binaryCurVersion, $binaryDeployVersion);
        }
        $uuid = (isset($resp['uuid'])) ? $resp['uuid'] : null;
        $lastHeartbeatTime = (isset($resp['lastHeartbeatTime'])) ? $resp['lastHeartbeatTime'] : null;
        $createTime = (isset($resp['createTime'])) ? $resp['createTime'] : null;
        $lastModifyTime = (isset($resp['lastModifyTime'])) ? $resp['lastModifyTime'] : null;

        $this->setUuid($uuid);
        $this->setLastHeartbeatTime($lastHeartbeatTime);
        $this->setInfo($info);
        $this->setStatus($status);
        $this->setCreateTime($createTime);
        $this->setLastModifyTime($lastModifyTime);
    }

}
