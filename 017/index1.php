<?php

require __DIR__ . '/Bebras.php';


$bebras1 = new Bebras;
$bebras2 = new Bebras;


$bebras1->pasverti();

echo $bebras1->ugis;
echo '<br>';
echo $bebras1->svoris;
echo '<br>';
echo $bebras1->uodega;
echo '<br>';


echo $bebras1->koksSvoris();
echo '<br>';



$bebras1->duotiMaisto(4);

echo $bebras1->koksSvoris();
echo '<br>';


