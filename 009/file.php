<?php


// file_put_contents('file.txt', 'Are you still here?');

$fileContent = file_get_contents('https://www.vz.lt/');

$fileContent = str_replace('Prenumeruoti', 'Bebrai Jėga', $fileContent);
$fileContent = str_replace('charset=Windows-1257', 'charset=UTF-8', $fileContent);

echo $fileContent;

