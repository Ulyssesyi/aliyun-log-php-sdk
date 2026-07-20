<?php declare(strict_types=1);

namespace Aliyun\Log;

class ProtobufEnum {
    /**
     * Subclasses should override this with their own values.
     * @var array<string, string>
     */
    protected static $_values = [];

    public static function toString($value) {
        if (is_null($value)) {
            return null;
        }
        if (array_key_exists($value, self::$_values)) {
            return self::$_values[$value];
        }
        return 'UNKNOWN';
    }
}
