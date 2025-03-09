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
define('ACTION_QUIZZES_CREATE', "dleGameCreate");
define('ACTION_QUIZZES_DISPLAY_ALL', "DisplayQuizzAll");
define('ACTION_QUIZZES_DISPLAY_USER', "DisplayQuizzUser");
define('ACTION_QUIZZES_UPDATE', "updateQuizz");
define('ACTION_QUIZZES_DELETE', "deleteQuizz");
define('ACTION_QUIZZES_PLAY', "playQuizz");
define('ACTION_QUIZZES_MANAGE', "manageQuizz");

define('URL_QUIZZES_CREATE', $routerURL . 'action=' . ACTION_QUIZZES_CREATE);
define('URL_QUIZZES_DISPLAY_ALL', $routerURL . 'action=' . ACTION_QUIZZES_DISPLAY_ALL);
define('URL_QUIZZES_DISPLAY_USER', $routerURL . 'action=' . ACTION_QUIZZES_DISPLAY_USER);
define('URL_QUIZZES_UPDATE', $routerURL . 'action=' . ACTION_QUIZZES_UPDATE);
define('URL_QUIZZES_DELETE', $routerURL . 'action=' . ACTION_QUIZZES_DELETE);
define('URL_QUIZZES_PLAY', $routerURL . 'action=' . ACTION_QUIZZES_PLAY);
define('URL_QUIZZES_MANAGE', $routerURL . 'action=' . ACTION_QUIZZES_MANAGE);


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
