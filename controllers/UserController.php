<?php
// controllers/UserController.php

require_once '../models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // Revient au menu principal
    public function index() {
        $posts = $this->model->readAll();
        require '../views/index.php';
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
            require '../views/user/Signin.php';
        }
    }

    // Modifier un article
    public function edit($id) {
        $post = $this->model->readById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->model->update($id, $title, $content);
            header("Location: ". ROOT_URL);
        } else {
            require '../views/blog/edit.php';
        }
    }

    // Supprimer un article
    public function delete($id) {
        $this->model->delete($id);
        header("Location: ". ROOT_URL);
    }
}
?>
