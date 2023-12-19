<?php

define('OK', true);

echo '<h1>Big INDEX</h1>';


include_once __DIR__ . '/f1.php';

echo '<h1>Big INDEX middle</h1>';

include_once __DIR__ . '/f1.php';

if (file_exists(__DIR__ . '/f2.php')) {
    require __DIR__ . '/f2.php';
}

require __DIR__ . '/../here.php';

// require is only one realy correct way to include files


echo '<h1>Big INDEX end</h1>';
