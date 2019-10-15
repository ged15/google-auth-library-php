<?php

date_default_timezone_set('CET');

// Oct 28 00:00:00 UTC
// Oct 28 00:00:00 UTC
// Oct 28 00:50:00 UTC
// Oct 28 00:00:00 UTC
// Oct 28 02:00:00 UTC

function printTime(DateTimeImmutable $time)
{
    static $last = null;

    echo $time->format('Y-m-d H:i:s'), "; CET: ", $time->getTimestamp(), "; UTC: ", $time->setTimezone(new DateTimeZone('UTC'))->getTimestamp();

    if ($last !== null) {
        echo "; CET diff: ", $time->getTimestamp() - $last->getTimestamp();
        echo "; UTC diff: ", $time->setTimezone(new DateTimeZone('UTC'))->getTimestamp() - $last->setTimezone(new DateTimeZone('UTC'))->getTimestamp();
    }

    echo "\n";
    $last = $time;
}

printTime(new \DateTimeImmutable('2018-10-28 01:00:00', new DateTimeZone('UTC')));
printTime(new \DateTimeImmutable('2018-10-28 01:01:00', new DateTimeZone('UTC')));
printTime(new \DateTimeImmutable('2018-10-28 01:50:00', new DateTimeZone('UTC')));
printTime(new \DateTimeImmutable('2018-10-28 01:59:00', new DateTimeZone('UTC')));
printTime(new \DateTimeImmutable('2018-10-28 01:59:59', new DateTimeZone('UTC')));
printTime(new \DateTimeImmutable('2018-10-28 02:00:00', new DateTimeZone('UTC')));
