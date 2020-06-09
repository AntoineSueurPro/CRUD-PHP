<?php

require '../config/dev.php';
require '../vendor/autoload.php';
session_start();
$router = new \projet_4\config\Router();
$router->run();

//PAGE INDEX QUI LANCE LA SESSION ET LE ROUTEUR - VIA LE ROUTER ELLE REDIRIGE VERS HOME.PHP DE BASE
