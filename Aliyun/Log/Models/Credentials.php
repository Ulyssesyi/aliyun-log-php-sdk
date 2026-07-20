<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Credentials {
    public function __construct(
        private string $accessKeyId,
        private string $accessKeySecret,
        private string $securityToken = '',
    ) {
    }

    public function getAccessKeyId(): string {
        return $this->accessKeyId;
    }
    public function setAccessKeyId(string $accessKeyId): void {
        $this->accessKeyId = $accessKeyId;
    }
    public function getAccessKeySecret(): string {
        return $this->accessKeySecret;
    }
    public function setAccessKeySecret(string $accessKeySecret): void {
        $this->accessKeySecret = $accessKeySecret;
    }
    public function getSecurityToken(): string {
        return $this->securityToken;
    }
    public function setSecurityToken(string $securityToken): void {
        $this->securityToken = $securityToken;
    }
}
