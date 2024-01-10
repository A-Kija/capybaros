<?php
use Colors\App\App;

require '../vendor/autoload.php';
define('ROOT', __DIR__ . '/../');
define('URL', 'http://super-colors.test');


echo App::run();