<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * The response of the ListTopics API from log service.
 *
 * @author log service dev
 */
class ListTopicsResponse extends \Aliyun\Log\Models\Response {
    private int $count;

    /** @var string[] */
    private array $topics;

    private ?string $nextToken;

    /**
     * ListTopicsResponse constructor
     *
     * @param array<string, mixed> $resp HTTP response body
     * @param array<string, string> $header HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = (int) $header['x-log-count'];
        $this->topics = $resp;
        $this->nextToken = $header['x-log-nexttoken'] ?? null;
    }

    /**
     * Get the number of all the topics from the response
     */
    public function getCount(): int {
        return $this->count;
    }

    /**
     * Get all the topics from the response
     *
     * @return string[]
     */
    public function getTopics(): array {
        return $this->topics;
    }

    /**
     * Return the next token from the response. If there is no more topic to list, it will return null
     */
    public function getNextToken(): ?string {
        return $this->nextToken;
    }
}
