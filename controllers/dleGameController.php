<?php
// controllers/UserController.php

require_once '../models/userModel.php';

class dleGameController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // Revient au menu principal
    public function index() {
        $posts = $this->model->readAll();
        require '../view/index.php';
    }
}
?>
