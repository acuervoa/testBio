<?php

namespace Biorrhythms;

/**
 * Created by PhpStorm.
 * User: andres.cuervo
 * Date: 14/03/2016
 * Time: 16:12
 */
class Biorrhythms
{

    const PHYSICAL_TIME_PERIOD = 23;
    const EMOTIONAL_TIME_PERIOD = 28;
    const INTELLECTUAL_TIME_PERIOD = 33;

    public function calculateBiorrhytms($time, $typeTimePeriod)
    {
        return (sin((2 * M_PI * $time / $typeTimePeriod)));
    }
}
