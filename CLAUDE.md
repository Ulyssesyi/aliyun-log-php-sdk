# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

PHP SDK for Alibaba Cloud Log Service (SLS). Composer package `sabao/aliyun-log-php-sdk`, licensed MIT.

- **Runtime**: PHP 8.1+, requires ext-curl, ext-json, ext-zlib
- **Namespace**: `Aliyun\Log\` (PSR-4 autoloaded from `Aliyun/Log/`)
- **API version**: `SLS_API_VERSION = '0.6.0'`

## Commands

| Command | Purpose |
|---|---|
| `composer cs-fix` | Auto-fix code style (PHP-CS-Fixer) |
| `composer cs-check` | Check code style without modifying |
| `composer phpstan` | Static analysis at level 9 |
| `composer check` | Run both cs-check and phpstan |
| `vendor/bin/phpunit` | Run all tests |
| `vendor/bin/phpunit tests/EndpointTest.php` | Run a single test file |
| `vendor/bin/phpunit --filter=testMethodName` | Run a specific test method |

## Architecture

### Request Pipeline

```
User Code
  -> Client::putLogs() / getLogs() / etc.
    -> Client::executeApi(Req)  or  send(Req)    // signs request, attaches auth headers
      -> Client::sendRequest(Method, Url, Body)  // handles 200 vs error responses
        -> RequestCore::send_request()            // cURL wrapper
          -> ResponseCore                         // {headers, body, status}
```

### Key Classes

**Client** (`Aliyun\Log\Client`): The main API facade. 30+ methods covering log read/write, LogStore management, shards, config, machine groups, ACLs, shippers, and SQL queries. Constructor takes `(endpoint, accessKeyId, accessKeySecret, ?token, ?CredentialsProvider)`.

Every API method follows the same pattern:
1. Accept a **Request DTO** as the single argument
2. Call `executeApi()` / `send()` internally (which signs the request with HMAC-SHA1)
3. Return a **Response DTO**

**Request DTOs** (`Aliyun\Log\Models\Request\*`): Simple data holders extending `Aliyun\Log\Models\Request` (which just holds a `$project` name). 30+ classes, one per API operation.

**Response DTOs** (`Aliyun\Log\Models\Response\*`): Data holders extending `Aliyun\Log\Models\Response` (which holds `$headers`). Provide typed accessors for the response data.

**Data Models** (`Aliyun\Log\Models\*`): Domain objects like `LogItem` (time + key-value pairs), `QueriedLog` (search results), `Histogram`, `Shard`, `Config`, `MachineGroup`, `ACL`, `OssShipperConfig` hierarchy, `CompressedLogGroup`.

### HTTP Transport

**RequestCore** (`Aliyun\Log\RequestCore`): Full cURL-based HTTP client with GET/POST/PUT/DELETE/HEAD, streaming, parallel multi-requests, SSL, and proxy support. HTTP errors are wrapped into `SDKException` by the Client.

### Credentials

The `CredentialsProvider` interface defines `getCredentials(): Credentials`. `Client` uses `StaticCredentialsProvider` by default but accepts any custom implementation.

### Exception Hierarchy

- **SDKException** — main exception class (`code` string + `message` + `requestId`)
- **RequestCoreException** — low-level cURL/transport errors, wrapped into SDKException by Client

### Protobuf Layer

Custom protobuf serialization (no Google protobuf library dependency). Base classes `ProtobufMessage`, `ProtobufEnum`, and utilities in `Protobuf`. Message classes: `Log`, `Log_Content`, `LogGroup`, `LogGroupList`.

### Logger System

**SimpleLogger**: Buffered logger that aggregates `LogItem` entries and flushes to SLS via `Client::putLogs()`. Configurable flush thresholds (count: 100, bytes: 256KB, time: 5s). Uses `LogLevel` PHP 8.1 enum (DEBUG/INFO/WARN/ERROR). **LoggerFactory** creates/shared instances keyed by project#logstore#topic.

### Utilities

**Util** (`Aliyun\Log\Util`): Static helpers for URL encoding, HMAC-SHA1 signing, MD5 hashing, canonical header/resource construction, protobuf binary serialization (`toBytes()`), and local IP resolution.

## Coding Standards

- All files use `declare(strict_types=1)`
- PSR-12 coding style with PHP 8.0/8.1 migration rules
- Short array syntax, single-quoted strings where possible
- Ordered imports alphabetically (class, function, const groups)
- **PHPStan level 9** required — no exceptions
- Tests use PHPUnit ^10.5 || ^11.2 (bootstrap: `vendor/autoload.php`, suite: `tests/`)

## File Layout

```
Aliyun/Log/
  Client.php                    Main SDK client
  Util.php                      Static helpers (signing, encoding, etc.)
  SDKException.php              Main exception
  RequestCore.php               cURL HTTP transport
  ResponseCore.php              HTTP response container
  Log.php, Log_Content.php, ... Protobuf message classes
  Protobuf.php, ProtobufMessage.php, ProtobufEnum.php
  LoggerFactory.php, SimpleLogger.php
  Models/
    Request.php                 Base request DTO
    Response.php                Base response DTO
    LogItem.php, Credentials.php, CredentialsProvider.php, ...
    LogLevel/LogLevel.php       PHP 8.1 enum
    Request/*.php               30+ request DTOs
    Response/*.php              30+ response DTOs
tests/
  EndpointTest.php
  ClientCurlErrorCompatibilityTest.php
  RequestCoreCurlCompatibilityTest.php
sample/
  sample.php, loggerSample.php, credentialsProviderSample.php
```

## Key Patterns

- **Every public API method** on Client takes a single Request DTO and returns a Response DTO
- **Request signing** is automatic in `send()` — uses canonicalized headers/resources via `Util`
- **Error handling**: non-200 responses throw `SDKException` with server error code/msg; cURL failures are wrapped from `RequestCoreException`
- **Protobuf binary** is used for writing logs (`putLogs`) and batch reads (`batchGetLogs`); JSON for most other APIs
- **Log writing** internally compresses the `LogGroup` protobuf with deflate before sending
