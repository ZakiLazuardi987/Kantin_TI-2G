<?php

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = explode("/", $url);

$baseurl = 'http://' . $url[2] . '/Kantin_TI-2G';

define('BASEURL', $baseurl);

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dbproject');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);