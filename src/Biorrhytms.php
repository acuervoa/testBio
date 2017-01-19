<?php
/**
 * Created by PhpStorm.
 * User: andres.cuervo
 * Date: 14/03/2016
 * Time: 16:12
 */

namespace Biorrhythms;


class Biorrhythms
{

    /**
     * Biorrhythms constructor.
     */
    public function __construct()
    {
    }

    public function calculatePhysical($time){
        return (sin((2 * M_PI * $time / 23)));
    }

    public function calculateEmotional($time){
        return (sin((2 * M_PI * $time /28)));
    }

    public function calculateIntellectual($time){
        return  (sin((2 * M_PI * $time/33)));
    }
}