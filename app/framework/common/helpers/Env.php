<?php

declare(strict_types=1);

namespace common\helpers;

/**
 * @method static string logFile()
 * @method static string logEnabled()
 * @method static string host()
 * @method static string jwtSecret()
 * @method static string jwtIssuer()
 * @method static string jwtSubject()
 * @method static string dadataApiKey()
 * @method static string yandexApiKey()
 */
class Env
{
    public static function __callStatic($name, $arguments)
    {
        return Convert::toString(getenv('ROUTES_API_' . strtoupper(Convert::camelCaseToUnderscore($name))));
    }
}
