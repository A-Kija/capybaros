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


// DELETE FROM table_name WHERE condition;

$id = $_POST['id'];

$sql = "
    DELETE FROM trees
    WHERE id = ?
    -- WHERE id = 123 OR 1
";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

header('Location: http://localhost/capybaros/db/');