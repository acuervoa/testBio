<?php
namespace Biorrhythms;

use Khill\Lavacharts\Lavacharts;

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


    public function printChar(Person $person)
    {
        $diff = $person->calculateDiff();
        $lava = new Lavacharts();

        $dataTable = $lava->DataTable();

        $dataTable->addNumberColumn('Now')
            ->addNumberColumn('Physical')
            ->addNumberColumn('Emotional')
            ->addNumberColumn('Intellectual');

        for ($i = ( $diff - 15 ); $i < ( $diff + 15 ); $i++)
        {
            $dateOfBirth = clone $person->getBirthDate();
        
            $dataTable->addRow([$i,
                    $this->calculateBiorrhytms($i, Biorrhythms::PHYSICAL_TIME_PERIOD),
                    $this->calculateBiorrhytms($i, Biorrhythms::EMOTIONAL_TIME_PERIOD),
                    $this->calculateBiorrhytms($i, Biorrhythms::INTELLECTUAL_TIME_PERIOD)
            ]);
        }
        $lava->LineChart('Bio', $dataTable, ['title' => 'Bio']);
        echo $lava->render('LineChart', 'Bio', 'bio-div');
    }
}
