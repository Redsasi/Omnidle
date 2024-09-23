<?php

$_POST[''];
if(!isset($_POST['username']) || empty($_POST['username']) ||
!isset($_POST['password']) || empty($_POST['password'])){
    echo json_encode([
        'success' => false,
        'message' => 'donnée manuqante'
    ]);
    exit();
}

include_once("bdd_connexion.php");
include_once("function.php");

$conn = get_conn();

$username = $_POST['username'];
$password = $_POST['password'];


$user = get_user_by_username($conn, $username);
if(!$user){
    echo json_encode([
        'success' => false,
        'message' => 'user unknown'
    ]);
    exit();
}
if(password_verify($password, $user['USER_PASSWORD'])){
    //TODO : CONNEXION
    echo json_encode([
        'success' => true,
        'message' => 'password don\'t match'
    ]);
}else{
    echo json_encode([
        'success' => false,
        'message' => 'password don\'t match'
    ]);
}
