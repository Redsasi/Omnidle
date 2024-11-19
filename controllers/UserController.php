<?php
// controllers/UserController.php

require_once '../models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // Créer un utilisateur
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $this->model->creat($pseudo, $email, $hashPass);
            header("Location: ". ROOT_URL);
        } else {
            require '../view/user/signin.php';
        }
    }
}
?>
