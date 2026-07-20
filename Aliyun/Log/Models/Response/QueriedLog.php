<?php declare(strict_types=1);

namespace Aliyun\Log\Models\Response;

/**
 * The QueriedLog is a log of the Aliyun_Log_Models_GetLogsResponse which obtained from the log.
 *
 * @author log service dev
 */
class QueriedLog {
    private int $time;

    private string $source;

    /** @var array<string, string> */
    private array $contents;

    /**
     * QueriedLog constructor
     *
     * @param array<string, string> $contents
     */
    public function __construct(int $time, string $source, array $contents) {
        $this->time = $time;
        $this->source = $source;
        $this->contents = $contents;
    }

    /**
     * Get log source
     */
    public function getSource(): string {
        return $this->source;
    }

    /**
     * Get log time
     */
    public function getTime(): int {
        return $this->time;
    }

    /**
     * Get log contents, content many key/value pair.
     *
     * @return array<string, string> log contents
     */
    public function getContents(): array {
        return $this->contents;
    }
}
