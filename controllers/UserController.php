<?php
// controllers/UserController.php

require_once '../models/userModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // Créer un utilisateur
    public function singUp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $this->model->creat($pseudo, $email, $hashPass);
            header("Location: ". ROOT_URL);
        } else {
            require '../view/user/signup.php';
        }
    }

    // connexion
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->readByEmail($email);
            if($user != null && password_verify($password,$user['USER_PASSWORD'])){
                session_start();
                $_SESSION["userId"] = $user['USER_ID'];
                header("Location: ". ROOT_URL);
            }else{
                require '../view/user/login.php'; //TODO : Display error message
            }
        } else {
            require '../view/user/login.php';
        }
    }

    // deconnexion
    public function logout() {
        unset($_SESSION["userId"]);
        header("Location: ". ROOT_URL);
    }
}
?>
