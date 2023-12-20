<?php
session_start();

$_SESSION['mano_sesija'] = 'skanus sesijas';
$_SESSION['logged'] = 'yes sesijas';

$_SESSION['log_time'] = time();

setcookie('mano_saldainis', 'skanus');
setcookie('mano_saldainis2', 'dar skanesnis');