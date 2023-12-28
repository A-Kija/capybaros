<?php
session_start();
// update box


$id = $_GET['id'] ?? 0;

if (!$id) {
    header('Location: http://localhost/capybaros/crud/read.php');
    exit;
}

$boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);

foreach ($boxes as $i => $box) {
    if ($box['boxId'] == $id) {
        $box['amount'] = (int) $_POST['amount'];
        $boxes[$i] = $box;
        break;
    }
}

file_put_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

header('Location: http://localhost/capybaros/crud/read.php');