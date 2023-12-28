<?php
session_start();

$boxId = rand(10000000, 99999999);
$amount = $_POST['amount'] ?? 0;

$boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);
$boxes[] = [
    'boxId' => $boxId,
    'amount' => (int) $amount,
];
file_put_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

$_SESSION['success'] = "Box #$boxId created";

header('Location: http://localhost/capybaros/crud/read.php');