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


// SELECT column1, column2, ...
// FROM table_name;

$sql = "
    SELECT id, name, height, type
    FROM trees
    -- WHERE height > height / 2
    ORDER BY height DESC
    -- LIMIT 0, 3
";

$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria Crud Trees</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Trees</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Height</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trees as $tree) : ?>
                <tr>
                    <td><?php echo $tree['id']; ?></td>
                    <td><?php echo $tree['name']; ?></td>
                    <td><?php echo $tree['height']; ?></td>
                    <td><?php echo $tree['type']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>   
