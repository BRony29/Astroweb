<?php

define('ROOT', str_replace('\\', '/', dirname(__DIR__)));

use Astroweb\Autoloader;
use Astroweb\Core\Main;

require_once 'Autoloader.php';
Autoloader::register();
$astroweb = new Main();
$astroweb->start();