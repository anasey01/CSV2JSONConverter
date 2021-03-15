<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Genre;
use App\Keyword;
use App\Reader;

$csvReader = (new Reader(new Genre()))->createFromPath('Movies.csv');

$csvReader->getRecords();

$csvReader->convertCSVRecordToJson();


$csvReader2 = (new Reader(new Keyword()))->createFromPath('Movies.csv');

$csvReader2->getRecords();

$csvReader2->convertCSVRecordToJson();
