<?php

require '../config/dev.php';
require '../vendor/autoload.php';
session_start();
$router = new \projet_4\config\Router();
$router->run();
