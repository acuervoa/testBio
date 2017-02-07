<?php
namespace tests;

use Biorrhythms\Biorrhythms;
use PHPUnit\Framework\TestCase;

/**
 * Class Biorryhtms Tests
 *
 * @author Andres Cuervo Adame <kuerbo@gmail.com>
 */
class BiorryhtmsTest extends TestCase
{

    protected $biorrhytms;

     /* Initialise classes to test against.
     *
     * @author    Andrés Cuervo Adame (kuerbo@gmail.com)
     * @return    void
     */
    public function setUp()
    {
        parent::setUp();
        $this->biorrhytms = new Biorrhythms();
    }
    
    

    public function dataPhysicalProvider()
    {
        return array(
                [0, 0],
                [1, 0.26979677115702427],
                [7, 0.94226092211882051],
                [23, 0],
                [17, -0.99766876919053926],
        );
    }

    public function dataEmotionalProvider()
    {
        return array(
                [0, 0],
                [1, 0.22252093395631439],
                [28, 0],
                [35, 1],
                [50, -0.97492791218182373],
        );
    }

    public function dataIntellectualProvider()
    {
        return array(
                [0, 0],
                [1, 0.18925124436041019],
                [33, 0],
                [41, 0.99886733918300796],
                [91, -0.99886733918300807],
        );
    }

    /**
     * @testdox    get a valid Physical Biorrhytms value.
     *
     * @author    Andrés Cuervo Adame (kuerbo@gmail.com)
     * @dataProvider dataPhysicalProvider
     * @return    void
     */
    public function test_if_physical_biorrhytm_value_is_valid($time, $result)
    {
        $this->assertEquals($result, $this->biorrhytms->calculateBiorrhytms($time, Biorrhythms::PHYSICAL_TIME_PERIOD));
    }

    /**
     * @testdox    get a valid Emotional Biorrhytms value.
     *
     * @author    Andrés Cuervo Adame (kuerbo@gmail.com)
     * @dataProvider dataEmotionalProvider
     * @return    void
     */
    public function test_if_emotional_biorrhytm_value_is_valid($time, $result)
    {
        $this->assertEquals($result, $this->biorrhytms
            ->calculateBiorrhytms($time, Biorrhythms::EMOTIONAL_TIME_PERIOD));
    }

    /**
     * @testdox    get a valid Intellectual Biorrhytms value.
     *
     * @author    Andrés Cuervo Adame (kuerbo@gmail.com)
     * @dataProvider dataIntellectualProvider
     * @return    void
     */
    public function test_if_intellectual_biorrhytm_value_is_valid($time, $result)
    {
        $this->assertEquals($result, $this->biorrhytms
            ->calculateBiorrhytms($time, Biorrhythms::INTELLECTUAL_TIME_PERIOD));
    }
}
