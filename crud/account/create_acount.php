<?php
require_once('../functions.php');
require_once('../bdd_connexion.php');
session_start();

//input existe
if(!isset($_POST["username"]) || empty($_POST["username"]) || 
!isset($_POST["email"]) || empty($_POST["email"]) ||
!isset($_POST["password"]) || empty($_POST["password"])){
    echo json_encode([
        'success' => false,
        'error' => 'unknown input'
    ]);
    exit();
}


$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// input validity
if(!check_usermane($username) || !check_email($email) || !check_password($password)){ 
    echo json_encode([
        'success' => false,
        'error' => 'input invalid'
    ]);
    exit();
}

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
creat_user($db, $username, $email, password_hash($password,PASSWORD_DEFAULT));

echo json_encode([
    'success' => true,
    'message' => 'account created'
]);
