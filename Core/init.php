<?php

namespace App\Core;

use App\Models\SettingsModel;
use App\Models\MembresModel;

// Initialisation des paramètres du site
$init = new SettingsModel;
$init = $init->find(1);
define('MAX_LOGIN_ERROR', $init->essaisMax);
define('MAX_TIMEOUT', $init->dureeSession);
define('MAX_SIZE_FILE', $init->poidsPhoto);
define('MAX_SIZE_THUMB', $init->poidsThumb);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
unset($init);

// initialisation des sessions.
session_start();

//Timeout de session
if (!isset($_SESSION['timeout'])){
    $_SESSION['timeout']=time();
}
if(time() - $_SESSION['timeout'] > MAX_TIMEOUT) {
    session_destroy();
    session_start();
}
$_SESSION['timeout']=time();

// Initialisation des sessions sur l'invité (visiteur non connecté)
if (!isset($_SESSION['user']) || is_null($_SESSION['user'])){
    $membresModel= new MembresModel;
    $_SESSION['user'] = $membresModel->findBy(['fonction'=>0])[0];
}