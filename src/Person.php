<?php
namespace Biorrhythms;

use Carbon\Carbon;

/**
 * Data for manage persons information.
 *
 * @author Andrés Cuervo Adame (kuerbo@gmail.com)
 */
class Person
{
    protected $birthDate;
    /**
     * Getter
     *
     * @author    Andrés Cuervo Adame (kuerbo@gmail.com)
     * @return    Carbon
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Setter
     *
     * @author   Andrés Cuervo Adame (kuerbo@gmail.com)
     * @param    Carbon    $birthDate   date of birth
     * @return   Person
     */
    public function setBirthDate(Carbon $birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }


    public function calculateDiff()
    {
        $result = $this->getBirthDate()->diffInDays(Carbon::now('Europe/Madrid'));
        return $result;
    }

}
