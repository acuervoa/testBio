<?php 

use Carbon\Carbon;
use Biorrhythms\Person;
use PHPUnit\Framework\TestCase;

/**
 * test for Person Calss.
 *
 * @author	Andrés Cuervo Adame (kuerbo@gmail.com)
 */
class PersonTest extends TestCase
{

	protected $person;

	/**
	 * Initialise classes to test against.
	 *
	 * @author	Andrés Cuervo Adame (kuerbo@gmail.com)
	 * @return	void
	 */
	public function setUp()
	{
		parent::setUp();
		
		$this->person = new Biorrhythms\Person();
	}

	
	public function dataBirthDateProvider()
	{
		return array(
				[Carbon::createFromDate(1972, 9, 19)],
				[Carbon::createFromDate(1971, 5, 30)], 
				[Carbon::createFromDate(1974, 11, 13)],
			);
	}

	public function dataBirthDateDiffNowProvider()
	{
		return array(
				[Carbon::createFromDate(1972, 9, 19), Carbon::createFromDate(1972, 9, 19)->diffInDays(Carbon::now())],
				[Carbon::createFromDate(1971, 5, 30), Carbon::createFromDate(1971, 5, 30)->diffInDays(Carbon::now())], 
				[Carbon::createFromDate(1974, 11, 13), Carbon::createFromDate(1974, 11, 13)->diffInDays(Carbon::now())],
			);
	}

	/**
	 * @testdox	Description.
	 *
	 * @author	Andrés Cuervo Adame (kuerbo@gmail.com)
	 * @dataProvider dataBirthDateProvider
	 * @return	void
	 */
	public function test_person_have_birthDate($birthDate)
	{
		$this->person->setBirthDate($birthDate);
		$this->assertNotNull($this->person->getBirthDate());
	}


	/**
	 * @dataProvider dataBirthDateDiffNowProvider
	 * @param  [type] $birthDate [description]
	 * @param  [type] $diff      [description]
	 * @return [type]            [description]
	 */
	public function test_diff_birthdate_with_actual_date($birthDate, $diff)
	{
		$this->person->setBirthDate($birthDate);
		$this->assertEquals($diff, $this->person->calculateDiff());
	}

}			