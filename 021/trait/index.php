<?php

require __DIR__ . '/Paint.php';
require __DIR__ . '/Stories.php';
require __DIR__ . '/Sing.php';
require __DIR__ . '/Person.php';



$p = new Person;


$p->sayHello();
$p->sing();
$p->tellStory();
$p->paint();
$p->scrolling();
$p->scrolling2();

echo $p->song;