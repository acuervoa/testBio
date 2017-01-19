<?php 


namespace Biorrhythms;

use Carbon\Carbon;

/**
 * Data for manage persons information.
 *
 * @author	Andrés Cuervo Adame (kuerbo@gmail.com)
 */
class Person
{

	protected $birthDate;
	/**
	 * Method description.
	 *
	 * @author	Andrés Cuervo Adame (kuerbo@gmail.com)
	 * @param	type	$parameter
	 * @return	type
	 */
	public function getBirthDate()
	{
		return $this->birthDate;
	}

	/**
	 * Method description.
	 *
	 * @author	Andrés Cuervo Adame (kuerbo@gmail.com)
	 * @param	type	$parameter
	 * @return	type
	 */
	public function setBirthDate(Carbon $birthDate)
	{
		$this->birthDate = $birthDate;
	}


	public function calculateDiff()
	{
		$result = $this->getBirthDate()->diffInDays(Carbon::now());
		return $result;
	}

}		