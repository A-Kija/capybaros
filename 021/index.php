<?php


require __DIR__ . '/H1.php';
require __DIR__ . '/RandomColor.php';



$text = new RandomColor();

echo $text->text2H1('Hello Racoon!');