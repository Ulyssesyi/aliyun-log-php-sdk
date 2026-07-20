<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class OssShipperCsvStorage extends OssShipperStorage {
    private $columns;
    private $delimiter = ',';
    private $quote = '';
    private $lineFeed = '\n';
    private $nullIdentifier = '';
    private $header = false;

    /**
     * @return mixed
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * @param mixed $columns
     */
    public function setColumns($columns): void {
        $this->columns = $columns;
    }

    /**
     * @return string
     */
    public function getDelimiter(): string {
        return $this->delimiter;
    }

    /**
     * @param string $delimiter
     */
    public function setDelimiter(string $delimiter): void {
        $this->delimiter = $delimiter;
    }

    /**
     * @return string
     */
    public function getQuote(): string {
        return $this->quote;
    }

    /**
     * @param string $quote
     */
    public function setQuote(string $quote): void {
        $this->quote = $quote;
    }

    /**
     * @return string
     */
    public function getNullIdentifier(): string {
        return $this->nullIdentifier;
    }

    /**
     * @param string $nullIdentifier
     */
    public function setNullIdentifier(string $nullIdentifier): void {
        $this->nullIdentifier = $nullIdentifier;
    }

    /**
     * @return bool
     */
    public function isHeader(): bool {
        return $this->header;
    }

    /**
     * @param bool $header
     */
    public function setHeader(bool $header): void {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getLineFeed(): string {
        return $this->lineFeed;
    }

    /**
     * @param string $lineFeed
     */
    public function setLineFeed(string $lineFeed): void {
        $this->lineFeed = $lineFeed;
    }

    public function to_json_object() {
        $detail =  [
            'columns' => $this->columns,
            'delimiter' => $this->delimiter,
            'quote' => $this->quote,
            'lineFeed' => $this->lineFeed,
            'nullIdentifier' => $this->nullIdentifier,
            'header' => $this->header,
        ];
        return [
            'detail' => $detail,
            'format' => 'csv',
        ];
    }
}
