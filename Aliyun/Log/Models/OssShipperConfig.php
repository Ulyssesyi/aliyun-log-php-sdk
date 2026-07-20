<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class OssShipperConfig {
    private ?string $ossBucket = null;
    private ?string $ossPrefix = null;
    private int $bufferInterval = 300;
    private ?int $bufferSize = null;
    private ?string $compressType = null;
    private ?string $roleArn = null;
    private ?string $pathFormat = null;
    private ?string $timeZone = null;
    private ?OssShipperStorage $storage = null;

    public function getRoleArn(): ?string {
        return $this->roleArn;
    }

    public function setRoleArn(?string $roleArn): void {
        $this->roleArn = $roleArn;
    }

    public function getPathFormat(): ?string {
        return $this->pathFormat;
    }

    public function setPathFormat(?string $pathFormat): void {
        $this->pathFormat = $pathFormat;
    }

    public function getStorage(): ?OssShipperStorage {
        return $this->storage;
    }

    public function setStorage(?OssShipperStorage $storage): void {
        $this->storage = $storage;
    }

    public function getOssBucket(): ?string {
        return $this->ossBucket;
    }

    public function setOssBucket(?string $ossBucket): void {
        $this->ossBucket = $ossBucket;
    }

    public function getOssPrefix(): ?string {
        return $this->ossPrefix;
    }

    public function setOssPrefix(?string $ossPrefix): void {
        $this->ossPrefix = $ossPrefix;
    }

    public function getBufferInterval(): int {
        return $this->bufferInterval;
    }

    public function setBufferInterval(int $bufferInterval): void {
        $this->bufferInterval = $bufferInterval;
    }

    public function getBufferSize(): ?int {
        return $this->bufferSize;
    }

    public function setBufferSize(int $bufferSize): void {
        if ($bufferSize > 256 || $bufferSize < 5) {
            throw new \Exception('buffSize is not valide, must between 5 and 256');
        }
        $this->bufferSize = $bufferSize;
    }

    public function getCompressType(): ?string {
        return $this->compressType;
    }

    public function setCompressType(?string $compressType): void {
        $this->compressType = $compressType;
    }

    public function getTimeZone(): ?string {
        return $this->timeZone;
    }

    public function setTimeZone(?string $timeZone): void {
        $this->timeZone = $timeZone;
    }

    /** @return array<string, mixed> */
    public function to_json_object(): array {
        $json =  [
            'ossBucket' => $this->ossBucket,
            'ossPrefix' => $this->ossPrefix,
            'bufferInterval' => $this->bufferInterval,
            'bufferSize' => $this->bufferSize,
            'compressType' => $this->compressType,
            'roleArn' => $this->roleArn,
            'pathFormat' => $this->pathFormat,
            'timeZone' => $this->timeZone,
            'storage' => $this->storage->to_json_object(),
        ];
        return $json;
    }
}
