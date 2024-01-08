<?php


require __DIR__ . '/Kibiras2.php';

$kibiras1 = new Kibiras2;
$kibiras2 = new Kibiras2;
$kibiras3 = new Kibiras2;


$kibiras1->prideti1Akmeni();
$kibiras1->pridetiDaugAkmenu(5);
$kibiras2->pridetiDaugAkmenu(10);
$kibiras3->pridetiDaugAkmenu(15);


echo $kibiras1->kiekPririnktaAkmenu();
echo '<br>';
echo $kibiras2->kiekPririnktaAkmenu();
echo '<br>';
echo $kibiras3->kiekPririnktaAkmenu();

echo '<br><br>';

echo $kibiras1->kiekVisoPririnktaAkmenu();
echo '<br>';
echo $kibiras2->kiekVisoPririnktaAkmenu();
echo '<br>';
echo $kibiras3->kiekVisoPririnktaAkmenu();
echo '<br>';
