<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
interface CredentialsProvider {
    public function getCredentials(): Credentials;
}
