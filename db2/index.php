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

$type = $_GET['type'] ?? 'inner';

$h1 = match ($type) {
    'inner' => 'INNER JOIN',
    'left' => 'LEFT JOIN',
    'right' => 'RIGHT JOIN',

};


if ('inner' == $type) {

// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;

$sql = "
    SELECT c.id, p.id AS pid, name, number, client_id
    FROM clients AS c
    INNER JOIN phones AS p
    ON c.id = p.client_id
";

}

if ('left' == $type) {

    // SELECT column_name(s)
    // FROM table1
    // LEFT JOIN table2
    // ON table1.column_name = table2.column_name;
    
    $sql = "
        SELECT c.id, p.id AS pid, name, number, client_id
        FROM clients AS c
        LEFT JOIN phones AS p
        ON c.id = p.client_id
    ";
    
}




$stmt = $pdo->query($sql);
$tableData = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria JOIN</title>
    
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 1em 5em;
        }
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
        .forms {
            margin-top: 20px;
            display: flex;
        }
        .forms form {
            width: 33%;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            box-shadow: 0 0 5px #ccc;
            box-sizing: border-box;
        }
        .forms form input, .forms form select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .forms form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1><?= $h1 ?></h1>
    <h2>Clients and Phones</h2>
    <table>
        <thead>
            <tr>
                <th>Client Id</th>
                <th>Name</th>
                <th>Phone Id</th>
                <th>Phone</th>
                <th>Client Id</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tableData as $data) : ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['pid']; ?></td>
                    <td><?php echo $data['number']; ?></td>
                    <td><?php echo $data['client_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="forms">
            <form>
                <h2>INNER JOIN</h2>
                <input type="hidden" name="type" value="inner">
                <button type="submit">INNER</button>
            </form>
            <form>
                <h2>LEFT JOIN</h2>
                <input type="hidden" name="type" value="left">
                <button type="submit">LEFT</button>
            </form>
        
    </div>
</body>
</html>   
