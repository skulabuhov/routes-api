<?php

declare(strict_types=1);

namespace common\helpers;

class Convert
{
    public static function toInt($value): int
    {
        return is_numeric($value) ? (int) $value : 0;
    }

    public static function toFloat($value): float
    {
        return (float) (is_numeric($value) ? $value : 0);
    }

    public static function toBool($value): bool
    {
        return (is_bool($value) || is_numeric($value)) && (bool)$value;
    }

    public static function toString($value): string
    {
        if (is_object($value) && method_exists($value, '__toString')) {
            return (string) $value;
        }

        return is_string($value) || is_numeric($value) ? (string) $value : '';
    }

    public static function camelCaseToUnderscore(string $str): string
    {
        $closure = function (array $param): string {
            return '_' . strtolower($param[1]);
        };

        return preg_replace_callback('/([A-Z])/', $closure, $str);
    }
}
