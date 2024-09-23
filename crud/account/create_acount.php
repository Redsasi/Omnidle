<?php

session_start();
//input existe

if(!isset($_POST["username"]) || empty($_POST["username"]) || 
!isset($_POST["email"]) || empty($_POST["email"]) ||
!isset($_POST["password"]) || empty($_POST["password"])){
    echo json_encode([
        'success' => false,
        'error' => 'unset parameters'
    ]);
    exit();
}

// input validity
if(false){ 
    echo json_encode([
        'success' => false,
        'error' => 'invalid parameters'
    ]);
    exit();
}
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

require_once('../bdd_connexion.php');
require_once('../functions.php');
$db = get_conn();

// verif id user already existe
if(get_user_by_email($db,$email)){
    echo json_encode([
        'success' => false,
        'error' => 'this account already existe'
    ]);
    exit();
}

// create new account
creat_user($db, $username, $email, $password);

