<?php
echo '<pre>';

$animals = require __DIR__ . '/animals.php';

$animals[1] = 'Good ' . $animals[1];

$animals[301] = 'Good ' . $animals[1];

$json = json_encode($animals);
$ser = serialize($animals);

file_put_contents(__DIR__ . '/animals.json', $json);
file_put_contents(__DIR__ . '/animals.ser', $ser);

$getJson = file_get_contents(__DIR__ . '/animals.json');
$getSer = file_get_contents(__DIR__ . '/animals.ser');

$data = json_decode($getJson, true);
$data = unserialize($getSer);


$copy = array_map(function($item) {
    return $item;
}, $data);


print_r($copy);


echo '</pre>';