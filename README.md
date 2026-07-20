# Aliyun Log Service PHP SDK

## Introduction

Log Service SDK for PHP，used to set/get log data to Aliyun Log Service(www.aliyun.com/product/sls).

API Reference: [中文](https://help.aliyun.com/document_detail/29007.html) [ENGLISH](https://www.alibabacloud.com/help/doc-detail/29007.htm)

## Requirements

- PHP 8.1+
- ext-curl
- ext-json
- ext-zlib

## Installation

```bash
composer require sabao/aliyun-log-php-sdk
```

## Quick Start

```php
<?php

use Aliyun\Log\Client;
use Aliyun\Log\Models\Request\ListLogstoresRequest;

$client = new Client('your-endpoint', 'your-access-key-id', 'your-access-key-secret');
$request = new ListLogstoresRequest('your-project');
$response = $client->listLogstores($request);
```

## License

MIT
