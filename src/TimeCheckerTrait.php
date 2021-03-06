<?php

namespace Garethellis\CrontabScheduleGenerator;

use Assert\Assertion;

trait TimeCheckerTrait
{
    private function getHoursAndMinutesFromTimeString($time)
    {
        Assertion::notBlank($time);

        $parts = explode(":", $time);

        Assertion::allIntegerish($parts);

        $hours = $parts[0] == "0" ? "0" : ltrim($parts[0], "0");

        Assertion::range($hours, "0", "23");

        $mins = "0";
        if (isset($parts[1])) {
            $mins = ltrim($parts[1], "0");
        }

        Assertion::range($mins, "0", "59");

        return [$hours, $mins];
    }
}
