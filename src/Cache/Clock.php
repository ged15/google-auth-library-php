<?php declare(strict_types=1);

namespace Google\Auth\Cache;

final class Clock
{
    private static $currentTime;

    /**
     * @return \DateTime
     */
    public static function now()
    {
        return self::$currentTime !== null ? clone self::$currentTime : new \DateTime();
    }

    /**
     * @param int|\DateInterval $seconds
     * @throws \InvalidArgumentException When $seconds is not an integer or \DateInterval.
     * @return \DateTime
     */
    public static function after($seconds)
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
