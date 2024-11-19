<?php

define('ROOT_URL', getRootUrl()); // root url

$routerURL = ROOT_URL . "index.php?"; // main menu

// USER
define('ACTION_CREATE_USER', "createUser");

define('URL_CREATE_USER', $routerURL . 'action=' . ACTION_CREATE_USER);



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
?>