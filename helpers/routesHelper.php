<?php

define('ROOT_URL', getRootUrl()); // root url

$routerURL = ROOT_URL . "index.php?"; // main menu

// USER
define('ACTION_USER_SINGUP', "userSingup");
define('ACTION_USER_LOGIN', "userLogin");
define('ACTION_USER_LOGOUT', "userLogout");

define('URL_USER_SINGUP', $routerURL . 'action=' . ACTION_USER_SINGUP);
define('URL_USER_LOGIN', $routerURL . 'action=' . ACTION_USER_LOGIN);
define('URL_USER_LOGOUT', $routerURL . 'action=' . ACTION_USER_LOGOUT);

// DLEGAME
define('ACTION_DLEGAME_CREATE', "dleGameCreate");
define('ACTION_DLEGAME_READALL', "dleGameReadAll");
define('ACTION_DLEGAME_READMINE', "dleGameReadMine");
define('ACTION_DLEGAME_UPDATE', "dleGameUpdate");
define('ACTION_DLEGAME_DELETE', "dleGameDelete");

define('URL_DLEGAME_CREATE', $routerURL . 'action=' . ACTION_DLEGAME_CREATE);
define('URL_DLEGAME_READALL', $routerURL . 'action=' . ACTION_DLEGAME_READALL);
define('URL_DLEGAME_READMINE', $routerURL . 'action=' . ACTION_DLEGAME_READMINE);
define('URL_DLEGAME_UPDATE', $routerURL . 'action=' . ACTION_DLEGAME_UPDATE);
define('URL_DLEGAME_DELETE', $routerURL . 'action=' . ACTION_DLEGAME_DELETE);


function getRootUrl() {
    // Determine the protocol
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    
    // Get the host name
    $host = $_SERVER['HTTP_HOST'];
    
    // Get the path to the current script, and remove the script filename (index.php)
    $scriptPath = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    
    // Combine to get the full root URL
    return $protocol . $host . $scriptPath;
}
