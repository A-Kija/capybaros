<?php require ROOT. 'views/nav.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>All colors</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($colors as $color): ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="color" style="
                                            background-color: <?= $color->color ?>;
                                            width: <?= $color->size ?>px;
                                            height: <?= $color->size ?>px;
                                            border: 1px solid #000;
                                            ">
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <p>Size: <?= $color->size ?>px</p>
                                        <p>Color: <?= $color->color ?></p>
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