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


    public function printPeriodChar(Person $person)
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
            $dataTable->addRow([$i,
                    $this->calculateBiorrhytms($i, Biorrhythms::PHYSICAL_TIME_PERIOD),
                    $this->calculateBiorrhytms($i, Biorrhythms::EMOTIONAL_TIME_PERIOD),
                    $this->calculateBiorrhytms($i, Biorrhythms::INTELLECTUAL_TIME_PERIOD)
            ]);
        }

        $properties = [
            
            'backgroundColor' => '#f1f8e9',
            'height'            => 384,
            'legend'            => ['position' => 'bottom'],   //Legend Options
            'title'             => 'Bio for person',
            'subtitle'          => 'person of interest',
            'width'             => 512,
            'pointSize'         => 1
            
        ];

        $lava->LineChart('Bio', $dataTable, $properties);
        echo $lava->render('LineChart', 'Bio', 'bio-div');
    }

    public function printDayChar(Person $person)
    {
        $diff = $person->calculateDiff();

        $lava = new Lavacharts();

        $dataTable = $lava->DataTable();

        $dataTable->addStringColumn('Biorrhythms')->addNumberColumn('Value');
                    

        $dataTable->addRow('Physical', [$this->calculateBiorrhytms($diff, Biorrhythms::PHYSICAL_TIME_PERIOD)]);
        $dataTable->addRow(['Emotional', $this->calculateBiorrhytms($diff, Biorrhythms::EMOTIONAL_TIME_PERIOD)]);
        $dataTable->addRow(['Intellectual', $this->calculateBiorrhytms($diff, Biorrhythms::INTELLECTUAL_TIME_PERIOD)]);
        
        $properties = [
            'backgroundColor' => '#f1f8e9',
            'height'            => 384,
            'legend'            => ['position' => 'bottom'],   //Legend Options
            'title'             => 'Bio for person',
            'width'             => 512
        ];

        $lava->ColumnChart('BioDay', $dataTable, $properties);
        
        echo $lava->render('ColumnChart', 'BioDay', 'bioday-div');
    }
}
