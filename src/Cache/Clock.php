<?php declare(strict_types=1);

namespace Google\Auth\Cache;

final class Clock
{
    private static $currentTime;

    public static function now(): \DateTime
    {
        return self::$currentTime !== null ? self::$currentTime : new \DateTime();
    }

    public static function after($seconds): \DateTime
    {
        if (is_int($seconds)) {
            $diff = new \DateInterval("PT{$seconds}S");
        } elseif ($time instanceof \DateInterval) {
            $diff = $time;
        } else {
            throw new \InvalidArgumentException();
        }

        return self::now()->add($diff);
    }

    public static function setTime(\DateTime $time)
    {
        self::$currentTime = $time;
    }
}
