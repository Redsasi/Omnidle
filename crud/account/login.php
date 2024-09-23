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

// verif if user existe
if(false){
    
    echo json_encode([
        'success' => false,
        'error' => 'this account already existe'
    ]);
    exit();
}

require_once('../bdd_connexion.php');
require_once('../functions.php');
// create new account


