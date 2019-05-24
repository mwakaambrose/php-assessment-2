<?php

namespace App\Cache;

use Redis;

class AppCache
{
    public static function remember($key, $expiration, $callback)
    {
        if ($values = Redis::get($key)) {
            return $values;
        }
        Redis::setex($key, $expiration, $values = $callback());
        return $values;
    }
}

