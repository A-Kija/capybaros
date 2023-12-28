<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Show</title>
</head>
<body>

    <?php require __DIR__ . '/parts/nav.php' ?>
    <?php require __DIR__ . '/parts/msg.php' ?>

    <?php 
        $id = $_GET['id'] ?? 0;
        $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);    
        $box = null;
        foreach ($boxes as $item) {
            if ($item['boxId'] == $id) {
                $box = $item;
                break;
            }
        }
    ?>

    <?php if (!$box) : ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h2>Show</h2>
                    <div class="alert alert-danger" role="alert">
                        Box not found!
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h2>Show</h2>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i>Box ID:</i> <?= $box['boxId'] ?></h5>
                            <p class="card-text"><i>Mandarins amount:</i> <?= $box['amount'] ?></p>
                        
                            <a href="http://localhost/capybaros/crud/read.php" class="card-link">Show All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif ?>

</body>
</html>