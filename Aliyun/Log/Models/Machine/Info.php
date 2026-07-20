<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Machine;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Info {
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
