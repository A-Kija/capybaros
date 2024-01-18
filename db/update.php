<?php

$host = 'localhost';
$db   = 'forest';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);


// UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition;

$id = $_POST['id'];
$height = $_POST['height'];


$sql = "
    UPDATE trees
    SET height = :h
    WHERE id = :id
";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    'id' => $id,
    'h' => $height
]);


header('Location: http://localhost/capybaros/db/');

