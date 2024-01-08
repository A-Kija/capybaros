<?php


require __DIR__ . '/MarsoPalydovas.php';


$p1 = MarsoPalydovas::getPalydovai();
$p2 = MarsoPalydovas::getPalydovai();
$p3 = MarsoPalydovas::getPalydovai();
$p4 = MarsoPalydovas::getPalydovai();
$p5 = MarsoPalydovas::getPalydovai();

echo '<pre>';

var_dump($p1);
var_dump($p2);
var_dump($p3);
var_dump($p4);
var_dump($p5);