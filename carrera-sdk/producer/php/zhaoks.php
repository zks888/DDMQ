<?php
$_SERVER['argv'] = array(__DIR__."/index.php", "test", "testCarrera", "produce");

$argv = array_slice($_SERVER['argv'], 1);
$_SERVER['argc'] = count($_SERVER['argv']);
$_SERVER['SERVER_PORT'] = '80';
$_SERVER['HTTP_X_REAL_IP'] = '127.0.0.1';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['SERVER_NAME'] = 'dev.aci.com';
$_SERVER['REQUEST_URI'] = '/'.implode('/', $argv);
unset($argv);

include 'index.php';