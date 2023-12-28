<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Confirm Delete</title>
    <style>
        .delete {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }
        .delete-container {
            width: 400px;
            height: 200px;
            border-radius: 10px;
            border: 2px solid crimson;
            color: crimson;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .delete-container div {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="delete">
        <div class="delete-container">
            <h2>Are you sure?</h2>
            <div>
                <form action="http://localhost/capybaros/crud/destroy.php?id=<?= $_GET['id'] ?? 0 ?>" method="post">
                    <button type="submit" class="btn btn-outline-primary">Yes</button>
                </form>
                <a href="http://localhost/capybaros/crud/read.php" class="btn btn-outline-secondary">No</a>
            </div>
            
        </div>
    </div>
</body>
</html>