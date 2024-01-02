<?php

require __DIR__ . '/Nso.php';

$nso1 = new Nso(1, 'green');

$nso2 = $nso1; // by reference

$nso3 = new Nso(3);

echo '<pre>';

// $nso1->__construct(51);

$nso1->changeColor('blue');


echo $nso1->speed . '<br>';

$nso1->speed = 'slow';


echo $nso1->speed . '<br>';

$nso1->goFly();

// $nso2->goSwim();



// echo $nso1->weight . '<br>';


print_r($nso1);
print_r($nso2);
print_r($nso3);