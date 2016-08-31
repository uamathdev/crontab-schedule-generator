<?php

namespace Garethellis\CrontabScheduleGenerator;

use Assert\Assertion;

class Weekly
{
    use TimeCheckerTrait;

    private $day;

    private $hours = 0;

    private $mins = 0;

    public function __toString()
    {
        if (!$this->day) {
            return "0 0 * * 0";
        }

        $dayAsNumber = date("w", strtotime($this->day));

        return sprintf("%s %s * * %s", $this->mins, $this->hours, $dayAsNumber);
    }

    public function on($day)
    {
        $day = ucfirst(strtolower($day));

        Assertion::choice($day, [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ]);

        $this->day = $day;
        return $this;
    }

    public function at($time)
    {
        list($hours, $mins) = $this->getHoursAndMinutesFromTimeString($time);

        $this->hours = $hours;
        $this->mins  = $mins;

        return $this;
    }
}
