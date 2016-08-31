<?php

namespace Garethellis\CrontabScheduleGenerator;

function daily()
{
    return new Daily();
}

function weekly()
{
    return new Weekly();
}

function monthly()
{
    return new Monthly();
}
