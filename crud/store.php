<?php

$boxId = rand(10000000, 99999999);
$amount = $_POST['amount'] ?? 0;

$boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);
$boxes[] = [
    'boxId' => $boxId,
    'amount' => $amount,
];
file_put_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

header('Location: http://localhost/capybaros/crud/read.php');