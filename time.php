<?php
date_default_timezone_set('CET');

$oneAm = new \DateTimeImmutable('2018-10-28 01:00:00'); // Oct 28 02:00:00 UTC
$oneFiftyAm = $oneAm->add(new DateInterval('PT50M')); // Oct 28 02:00:00 UTC
$twoAm = $oneFiftyAm->add(new DateInterval('PT10M')); // Oct 28 02:00:00 UTC
$threeAm = $twoAm->add(new DateInterval('PT1H')); // Oct 28 02:00:00 UTC

echo($oneAm->format('H:i:s') . "\n");
echo($oneFiftyAm->format('H:i:s') . "\n");
echo($twoAm->format('H:i:s') . "\n");
echo($threeAm->format('H:i:s') . "\n");

echo "\nUTC:\n";

echo($oneAm->setTimezone(new DateTimeZone('UTC'))->format('H:i') . "\n");
echo($oneFiftyAm->setTimezone(new DateTimeZone('UTC'))->format('H:i') . "\n");
echo($twoAm->setTimezone(new DateTimeZone('UTC'))->format('H:i') . "\n");
echo($threeAm->setTimezone(new DateTimeZone('UTC'))->format('H:i') . "\n");

var_dump($oneAm < $oneFiftyAm);
var_dump($oneFiftyAm < $twoAm);
var_dump($twoAm < $threeAm);

//$oneAm = $oneAm->setTimezone(new DateTimeZone('UTC'));
//$twoAm = $twoAm->setTimezone(new DateTimeZone('UTC'));
//$threeAm = $threeAm->setTimezone(new DateTimeZone('UTC'));
//
//var_dump($oneAm, $oneAm->getTimestamp());
//var_dump($twoAm, $twoAm->getTimestamp());
//var_dump($threeAm, $threeAm->getTimestamp());
