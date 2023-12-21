<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // show 405 error response
    header('HTTP/1.1 405 Method Not Allowed');
    die;
}
if (isset($_SESSION['login']) && $_SESSION['login'] == 'sitas yra prisilogines') {
    unset($_SESSION['login']);
    unset($_SESSION['name']);
}
header('Location: http://localhost/capybaros/auth/index.php');
die;