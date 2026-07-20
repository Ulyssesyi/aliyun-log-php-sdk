<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class StaticCredentialsProvider implements CredentialsProvider {
    private Credentials $credentials;

    public function __construct(string $accessKeyId, string $accessKeySecret, string $securityToken = '') {
        $this->credentials = new Credentials($accessKeyId, $accessKeySecret, $securityToken);
    }

    public function getCredentials(): Credentials {
        return $this->credentials;
    }
}
