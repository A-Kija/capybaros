<?php
session_start();
// destroy box by id

$id = $_GET['id'] ?? 0;

$boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);
foreach ($boxes as $index => $box) {
    if ($box['boxId'] == $id) {
        unset($boxes[$index]);
        break;
    }
}
$boxes = array_values($boxes);
file_put_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

$_SESSION['error'] = "Box #$id deleted";


header('Location: http://localhost/capybaros/crud/read.php');

