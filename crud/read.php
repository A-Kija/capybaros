<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="http://localhost/capybaros/crud/app.js" defer></script>
    <title>Read</title>
</head>
<body>

    <?php require __DIR__ . '/parts/nav.php' ?>
    <?php require __DIR__ . '/parts/msg.php' ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2">
                <h2>Read</h2>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-2">
                <form action="http://localhost/capybaros/crud/read.php" method="get">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Sort By</label>
                        <select class="form-select" name="sort">
                            <option value="default" <?= ($_GET['sort'] ?? '') == 'default' ? 'selected' : '' ?>>Default</option>
                            <option value="amount_asc" <?= ($_GET['sort'] ?? '') == 'amount_asc' ? 'selected' : '' ?> >By amount 0-9</option>
                            <option value="amount_desc" <?= ($_GET['sort'] ?? '') == 'amount_desc' ? 'selected' : '' ?> >By amount 9-0</option>
                            <option value="id_asc" <?= ($_GET['sort'] ?? '') == 'id_asc' ? 'selected' : '' ?>>By id 0-9</option>
                            <option value="id_desc" <?= ($_GET['sort'] ?? '') == 'id_desc' ? 'selected' : '' ?>>By id 9-0</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sort</button>
                    <a href="http://localhost/capybaros/crud/read.php" class="btn btn-secondary">Clear</a>
                </form>
            </div>
        </div>
    </div>


    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    <b>Box ID</b>
                    </div>
                    <div class="col-2">
                    <b>Amount</b>
                    </div>
                    <div class="col-8">
                    <b>Action</b>
                    </div>
                </div>
            </div>
        </li>

        <?php $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true) ?>
        <?php
        if (isset($_GET['sort'])) {
            match($_GET['sort']) {
                'amount_asc' => usort($boxes, fn($a, $b) => $a['amount'] <=> $b['amount']),
                'amount_desc' => usort($boxes, fn($a, $b) => $b['amount'] <=> $a['amount']),
                'id_asc' => usort($boxes, fn($a, $b) => $a['boxId'] <=> $b['boxId']),
                'id_desc' => usort($boxes, fn($a, $b) => $b['boxId'] <=> $a['boxId']),
                default => $boxes,
            };
        }

        ?>
        <?php foreach ($boxes as $box) : ?>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <?= $box['boxId'] ?>
                    </div>
                    <div class="col-2">
                        <?= $box['amount'] ?>
                    </div>
                    <div class="col-8">
                        <a href="http://localhost/capybaros/crud/show.php?id=<?= $box['boxId'] ?>" class="btn btn-outline-success btn-sm">Show</a>
                        <a href="http://localhost/capybaros/crud/edit.php?id=<?= $box['boxId'] ?>" class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="http://localhost/capybaros/crud/delete.php?id=<?= $box['boxId'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </li>

        <?php endforeach ?>
    </ul>
    
</body>
</html>