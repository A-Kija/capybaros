<?php

use Kaz\Ruta;
use But\Ruta as Butkute;

require __DIR__ . '/2/Sister.php';
require __DIR__ . '/1/Ruta.php';
require __DIR__ . '/2/Ruta.php';




$z1 = new Ruta();
$z2 = new Butkute();


echo $z1->name . ' ' . $z1->surname . '<br>';
echo $z2->name . ' ' . $z2->surname . '<br>';
echo $z2->sister . '<br>';


