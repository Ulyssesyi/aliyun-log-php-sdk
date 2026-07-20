<?php declare(strict_types=1);

namespace Aliyun\Log\Models;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

class OssShipperParquetStorage extends OssShipperStorage {
    /** @var string[]|null */
    private ?array $columns = null;

    /** @return string[]|null */
    public function getColumns(): ?array {
        return $this->columns;
    }

    /** @param string[]|null $columns */
    public function setColumns(?array $columns): void {
        $this->columns = $columns;
    }

    /** @return array<string, mixed> */
    public function to_json_object(): array {
        $detail = [
            'columns' => $this->columns,
        ];
        return [
            'detail' => $detail,
            'format' => 'parquet',
        ];
    }
}
