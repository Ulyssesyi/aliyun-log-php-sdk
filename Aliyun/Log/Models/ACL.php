<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */
class ACL {
    private ?string $principleType = '';
    private ?string $principleId = '';
    private ?string $object = '';
    /** @var list<string>|null */
    private ?array $privilege = [];
    private ?string $aclId = null;

    private string|int|null $createTime = null;
    private string|int|null $lastModifyTime = null;

    /**
     * @param list<string> $privilege
     */
    public function __construct(
        string $principleType = '',
        string $principleId = '',
        string $object = '',
        array $privilege = [],
        ?string $aclId = null,
        string|int|null $createTime = null,
        string|int|null $lastModifyTime = null,
    ) {
        $this->principleType = $principleType;
        $this->principleId = $principleId;
        $this->object = $object;
        $this->privilege = $privilege;
        $this->aclId = $aclId;

        $this->createTime = $createTime;
        $this->lastModifyTime = $lastModifyTime;
    }

    public function getPrincipleType(): ?string {
        return $this->principleType;
    }

    public function setPrincipleType(?string $principleType): void {
        $this->principleType = $principleType;
    }

    public function getPrincipleId(): ?string {
        return $this->principleId;
    }

    public function setPrincipleId(?string $principleId): void {
        $this->principleId = $principleId;
    }

    public function getObject(): ?string {
        return $this->object;
    }

    public function setObject(?string $object): void {
        $this->object = $object;
    }

    /**
     * @return list<string>|null
     */
    public function getPrivilege(): ?array {
        return $this->privilege;
    }

    /**
     * @param list<string>|null $privilege
     */
    public function setPrivilege(?array $privilege): void {
        $this->privilege = $privilege;
    }

    public function getAclId(): ?string {
        return $this->aclId;
    }

    public function setAclId(?string $aclId): void {
        $this->aclId = $aclId;
    }

    public function getCreateTime(): string|int|null {
        return $this->createTime;
    }

    public function setCreateTime(string|int|null $createTime): void {
        $this->createTime = $createTime;
    }

    public function getLastModifyTime(): string|int|null {
        return $this->lastModifyTime;
    }

    public function setLastModifyTime(string|int|null $lastModifyTime): void {
        $this->lastModifyTime = $lastModifyTime;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array {
        $format_array = [];
        if ($this->principleType !== null) {
            $format_array['principleType'] = $this->principleType;
        }
        if ($this->principleId !== null) {
            $format_array['principleId'] = $this->principleId;
        }
        if ($this->object !== null) {
            $format_array['object'] = $this->object;
        }
        if ($this->privilege !== null) {
            $format_array['privilege'] = $this->privilege;
        }
        if ($this->aclId !== null) {
            $format_array['aclId'] = $this->aclId;
        }
        if ($this->createTime !== null) {
            $format_array['createTime'] = $this->createTime;
        }
        if ($this->lastModifyTime !== null) {
            $format_array['lastModifyTime'] = $this->lastModifyTime;
        }

        return $format_array;
    }

    /**
     * @param array<string, mixed> $resp
     */
    public function setFromArray(array $resp): void {
        $rawPrincipleType = $resp['principleType'] ?? null;
        $this->setPrincipleType(is_string($rawPrincipleType) ? $rawPrincipleType : null);

        $rawPrincipleId = $resp['principleId'] ?? null;
        $this->setPrincipleId(is_string($rawPrincipleId) ? $rawPrincipleId : null);

        $rawObject = $resp['object'] ?? null;
        $this->setObject(is_string($rawObject) ? $rawObject : null);

        $rawPrivilege = $resp['privilege'] ?? null;
        $this->setPrivilege(is_array($rawPrivilege) ? array_values(array_filter($rawPrivilege, 'is_string')) : []);

        $rawAclId = $resp['aclId'] ?? null;
        $this->setAclId(is_string($rawAclId) ? $rawAclId : null);

        $rawCreateTime = $resp['createTime'] ?? null;
        $this->setCreateTime(is_string($rawCreateTime) || is_int($rawCreateTime) ? $rawCreateTime : null);

        $rawLastModifyTime = $resp['lastModifyTime'] ?? null;
        $this->setLastModifyTime(is_string($rawLastModifyTime) || is_int($rawLastModifyTime) ? $rawLastModifyTime : null);
    }
}
