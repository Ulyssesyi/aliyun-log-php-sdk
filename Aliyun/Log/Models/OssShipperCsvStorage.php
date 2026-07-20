<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class OssShipperCsvStorage extends OssShipperStorage {
    /** @var string[]|null */
    private ?array $columns = null;
    private string $delimiter = ',';
    private string $quote = '';
    private string $lineFeed = '\n';
    private string $nullIdentifier = '';
    private bool $header = false;

    /** @return string[]|null */
    public function getColumns(): ?array {
        return $this->columns;
    }

    /** @param string[]|null $columns */
    public function setColumns(?array $columns): void {
        $this->columns = $columns;
    }

    public function getDelimiter(): string {
        return $this->delimiter;
    }

    public function setDelimiter(string $delimiter): void {
        $this->delimiter = $delimiter;
    }

    public function getQuote(): string {
        return $this->quote;
    }

    public function setQuote(string $quote): void {
        $this->quote = $quote;
    }

    public function getNullIdentifier(): string {
        return $this->nullIdentifier;
    }

    public function setNullIdentifier(string $nullIdentifier): void {
        $this->nullIdentifier = $nullIdentifier;
    }

    public function isHeader(): bool {
        return $this->header;
    }

    public function setHeader(bool $header): void {
        $this->header = $header;
    }

    public function getLineFeed(): string {
        return $this->lineFeed;
    }

    public function setLineFeed(string $lineFeed): void {
        $this->lineFeed = $lineFeed;
    }

    /** @return array<string, mixed> */
    public function to_json_object(): array {
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
