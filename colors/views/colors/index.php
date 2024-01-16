<?php require ROOT. 'views/nav.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>All colors</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-2">
                                <form action="<?= URL ?>/colors/" method="get">
                                    <input type="hidden" name="sort" value="<?= $sortValue ?>">
                                    <button type="submit" class="sort-button">Size</button>
                                </form>
                            </div>
                            <div class="col-2">
                                <b>Color</b>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-4">
                                <b>Actions</b>
                            </div>
                        </div>

                        </li>
                        <?php foreach($colors as $color): ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="color" style="
                                            background-color: <?= $color->color ?>;
                                            width: <?= $color->size ?>px;
                                            height: <?= $color->size ?>px;
                                            border: 1px solid #000;
                                            ">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <p>Size: <?= $color->size ?>px</p>
                                    </div>
                                    <div class="col-2">
                                        <p>Color: <?= $color->color ?></p>
                                        <p>Color: <?= $color->name ?></p>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-4">
                                        <a href="<?= URL ?>/colors/edit/<?= $color->id ?>" class="btn btn-warning mb-1">Edit</a>
                                        <form action="<?= URL ?>/colors/destroy/<?= $color->id ?>" method="post">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
            
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>