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

    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = (int) $header['x-log-count'];
        $this->topics = $resp;
        $this->nextToken = $header['x-log-nexttoken'] ?? null;
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
