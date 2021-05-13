<?php

define('ROOT', str_replace('\\', '/', dirname(__DIR__)));

use App\Autoloader;
use App\Core\Main;

require_once 'Autoloader.php';
Autoloader::register();
$pegase = new Main();
$pegase->start();