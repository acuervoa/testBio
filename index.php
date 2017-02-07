<?php

require_once('vendor/autoload.php');
date_default_timezone_set('Europe/Madrid');
use Carbon\Carbon;
use Biorrhythms\Person;
use Biorrhythms\Biorrhythms;

$loader = new Twig_Loader_Filesystem('./templates/');
$twig = new Twig_Environment($loader);


$person =  new Person();
$person->setBirthDate(Carbon::createFromDate(1972, 9, 19, 'GMT'));

$biorrhythms = new Biorrhythms();
//$biorrhythms->printPeriodChar($person);
$biorrhythms->printDayChar($person);

echo $twig->render('index.html');

