<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class Credentials {
    /**
     * @var string
     */
    private $accessKeyId;
    /**
     * @var string
     */
    private $accessKeySecret;
    /**
     * @var string
     */
    private $securityToken;

    public function __construct(string $accessKeyId, string $accessKeySecret, string $securityToken = '') {
        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
        $this->securityToken = $securityToken;
    }

    /**
     * @return string accessKeyId
     */
    public function getAccessKeyId() {
        return $this->accessKeyId;
    }
    /**
     * @param string $accessKeyId
     */
    public function setAccessKeyId(string $accessKeyId): void {
        $this->accessKeyId = $accessKeyId;
    }
    /**
     * @return string accessKeySecret
     */
    public function getAccessKeySecret() {
        return $this->accessKeySecret;
    }
    /**
     * @param string $accessKeySecret
     */
    public function setAccessKeySecret(string $accessKeySecret): void {
        $this->accessKeySecret = $accessKeySecret;
    }
    /**
     * @return string securityToken
     */
    public function getSecurityToken() {
        return $this->securityToken;
    }
    /**
     * @param string $securityToken
     */
    public function setSecurityToken(string $securityToken): void {
        $this->securityToken = $securityToken;
    }
}
