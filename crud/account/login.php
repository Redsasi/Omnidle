<?php
require_once('../bdd_connexion.php');
require_once('../functions.php');
session_start();

//input existe

if(!isset($_POST["email"]) || empty($_POST["email"]) ||
!isset($_POST["password"]) || empty($_POST["password"])){
    echo json_encode([
        'success' => false,
        'error' => 'unknown input'
    ]);
    exit();
}

$email = $_POST["email"];
$password = $_POST["password"];

// input validity
if(!check_email($email) || !check_password($password)){ 
    echo json_encode([
        'success' => false,
        'error' => 'input invalid'
    ]);
    exit();
}


// verif if user existe
if(false){
    echo json_encode([
        'success' => false,
        'error' => 'user unknown'
    ]);
    exit();
}

