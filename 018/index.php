<?php

require __DIR__ . '/Afrika.php';
require __DIR__ . '/ManoAfrika.php';
require __DIR__ . '/Dramblys.php';
require __DIR__ . '/Krokodilas.php';


$dramblys = new Dramblys;
$krokodilas = new Krokodilas;


// echo '<pre>';
// var_dump($dramblys);

echo $dramblys->pavadinimas . '<br>';
echo $dramblys->zemynas . '<br>';
echo $dramblys->socialinisTinklas . '<br>';

$dramblys->padainuok();

echo $krokodilas->pavadinimas . '<br>';
echo $krokodilas->zemynas . '<br>';
echo $krokodilas->socialinisTinklas . '<br>';

$krokodilas->padainuok();

