<?php

require_once('vendor/autoload.php');
date_default_timezone_set('Europe/Madrid');
use Carbon\Carbon;
use Biorrhythms\Person;
use Biorrhythms\Biorrhythms;

$person =  new Person();
$person->setBirthDate(Carbon::createFromDate(1972, 9, 19, 'GMT'));

$biorrhythms = new Biorrhythms();
$diff = $person->calculateDiff();
$physical = $biorrhythms->calculateBiorrhytms($diff, Biorrhythms::PHYSICAL_TIME_PERIOD);
$emotional = $biorrhythms->calculateBiorrhytms($diff, Biorrhythms::EMOTIONAL_TIME_PERIOD);
$intellectual = $biorrhythms->calculateBiorrhytms($diff, Biorrhythms::INTELLECTUAL_TIME_PERIOD);

$lava = new Khill\Lavacharts\Lavacharts();
$dataTable = $lava->DataTable();
$dataTable->addNumberColumn('Now')
    ->addNumberColumn('Physical')
    ->addNumberColumn('Emotional')
    ->addNumberColumn('Intellectual');

for ($i = ( $diff - 15 ); $i < ( $diff + 15 ); $i++)
{
    $dateOfBirth = clone $person->getBirthDate();
    echo $i . '--' . $person->getBirthDate() . '--'  . $dateOfBirth->addDays($i) . '<br>';
    $dataTable->addRow([$i,
            $biorrhythms->calculateBiorrhytms($i, Biorrhythms::PHYSICAL_TIME_PERIOD),
            $biorrhythms->calculateBiorrhytms($i, Biorrhythms::EMOTIONAL_TIME_PERIOD),
            $biorrhythms->calculateBiorrhytms($i, Biorrhythms::INTELLECTUAL_TIME_PERIOD)
    ]);
}

$lava->LineChart('Bio', $dataTable, ['title' => 'Bio']);
echo $lava->render('LineChart', 'Bio', 'bio-div', ['width'=>512, 'height'=>384]);
