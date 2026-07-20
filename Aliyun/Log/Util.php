<?php declare(strict_types=1);

namespace Aliyun\Log;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class Util {
    /**
     * Get the local machine ip address.
     */
    public static function getLocalIp(): string {
        $local_ip = gethostbyname(php_uname('n'));
        if ($local_ip == '') {
            $host = gethostname();
            if ($host !== false) {
                $local_ip = gethostbyname($host);
            }
        }
        return $local_ip;
    }

    /**
     * If $gonten is raw IP address, return true.
     */
    public static function isIp(string $gonten): bool {
        $ip = explode('.', $gonten);
        for ($i = 0;$i < count($ip);++$i) {
            if ($ip[$i] > 255) {
                return false;
            }
        }
        return (bool) preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $gonten);
    }

    /**
     * Calculate string $value MD5.
     */
    public static function calMD5(string $value): string {
        return strtoupper(md5($value));
    }

    /**
     * Calculate string $content hmacSHA1 with secret key $key.
     */
    public static function hmacSHA1(string $content, string $key): string {
        $signature = hash_hmac('sha1', $content, $key, true);
        return base64_encode($signature);
    }

    /**
     * Change $logGroup to bytes.
     */
    public static function toBytes(LogGroup $logGroup): string {
        $mem = fopen('php://memory', 'rwb');
        if ($mem === false) {
            return '';
        }
        $logGroup->write($mem);
        rewind($mem);
        $bytes = '';

        if (feof($mem) === false) {
            $read = fread($mem, 10 * 1024 * 1024);
            if ($read !== false) {
                $bytes = $read;
            }
        }
        fclose($mem);

        return $bytes;
    }

    public static function urlEncodeValue(string $value): string {
        return urlencode($value);
    }

    /**
     * @param array<string, string> $params
     */
    public static function urlEncode(array $params): string {
        ksort($params);
        $url = '';
        $first = true;
        foreach ($params as $key => $value) {
            $val = self::urlEncodeValue($value);
            if ($first) {
                $first = false;
                $url = "$key=$val";
            } else {
                $url .= "&$key=$val";
            }
        }
        return $url;
    }

    /**
     * Get canonicalizedLOGHeaders string as defined.
     *
     * @param array<string, string> $header
     */
    public static function canonicalizedLOGHeaders(array $header): string {
        ksort($header);
        $content = '';
        $first = true;
        foreach ($header as $key => $value) {
            if (str_starts_with($key, 'x-log-')   || str_starts_with($key, 'x-acs-')) { // x-log- header
                if ($first) {
                    $content .= $key . ':' . $value;
                    $first = false;
                } else {
                    $content .= "\n" . $key . ':' . $value;
                }
            }
        }
        return $content;
    }

    /**
     * Get canonicalizedResource string as defined.
     *
     * @param array<string, string>|null $params
     */
    public static function canonicalizedResource(string $resource, ?array $params): string {
        if ($params) {
            ksort($params);
            $urlString = '';
            $first = true;
            foreach ($params as $key => $value) {
                if ($first) {
                    $first = false;
                    $urlString = "$key=$value";
                } else {
                    $urlString .= "&$key=$value";
                }
            }
            return $resource . '?' . $urlString;
        }
        return $resource;
    }

    /**
     * Get request authorization string as defined.
     *
     * @param array<string, string>|null $params
     * @param array<string, string> $headers
     */
    public static function getRequestAuthorization(string $method, string $resource, string $key, ?string $stsToken, ?array $params, array $headers): string {
        if (! $key) {
            return '';
        }
        $content = $method . "\n";
        if (isset($headers['Content-MD5'])) {
            $content .= $headers['Content-MD5'];
        }
        $content .= "\n";
        if (isset($headers['Content-Type'])) {
            $content .= $headers['Content-Type'];
        }
        $content .= "\n";
        $content .= $headers['Date'] . "\n";
        $content .= self::canonicalizedLOGHeaders($headers) . "\n";
        $content .= self::canonicalizedResource($resource, $params);
        return self::hmacSHA1($content, $key);
    }

}
