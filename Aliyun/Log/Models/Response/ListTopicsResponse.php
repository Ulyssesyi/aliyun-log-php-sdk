<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

use Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListTopics API from log service.
 *
 * @author log service dev
 */
class ListTopicsResponse extends Response {
    private int $count;

    /** @var string[] */
    private array $topics;

    private ?string $nextToken;

    /**
     * @param array<string, mixed> $resp
     * @param array<string, mixed> $header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $countVal = $header['x-log-count'];
        $this->count = is_numeric($countVal) ? (int) $countVal : 0;
        $this->topics = array_values(array_filter($resp, 'is_string'));
        $nextTokenVal = $header['x-log-nexttoken'] ?? null;
        $this->nextToken = is_string($nextTokenVal) ? $nextTokenVal : null;
    }

    public function getCount(): int {
        return $this->count;
    }

    /** @return string[] */
    public function getTopics(): array {
        return $this->topics;
    }

    /** Return the next token. null if there are no more topics. */
    public function getNextToken(): ?string {
        return $this->nextToken;
    }
}
