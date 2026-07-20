<?php

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
    /**
     * @var int the number of all the topics from the response
     */
    private $count;

    /**
     * @var string[] topics list
     */
    private $topics;

    /**
     * @var string|null the next token from the response. If there is no more topic to list, it will return null
     */
    private $nextToken;

    /**
     * ListTopicsResponse constructor
     *
     * @param array<string, mixed> $resp
     *            HTTP response body
     * @param array<string, string> $header
     *            HTTP response header
     */
    public function __construct(array $resp, array $header) {
        parent::__construct($header);
        $this->count = (int) $header['x-log-count'];
        $this->topics = $resp;
        $this->nextToken = $header['x-log-nexttoken'] ?? null;
    }

    /**
     * Get the number of all the topics from the response
     *
     * @return int the number of all the topics from the response
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Get all the topics from the response
     *
     * @return string[] topics list
     */
    public function getTopics() {
        return $this->topics;
    }

    /**
     * Return the next token from the response. If there is no more topic to list, it will return null
     *
     * @return string|null next token used to list more topics
     */
    public function getNextToken() {
        return $this->nextToken;
    }
}
