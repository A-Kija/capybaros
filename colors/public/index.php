<?php
use Colors\App\App;
use Colors\App\Message;
use Colors\App\Auth;

session_start();

define('DB', 'maria');

require '../vendor/autoload.php';
define('ROOT', __DIR__ . '/../');
define('URL', 'http://super-colors.test');
Message::get();
Auth::get();


echo App::run();