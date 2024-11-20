<?php
// controllers/UserController.php

require_once '../models/dleGameModel.php';

class dleGameController {
    private $model;

    public function __construct() {
        $this->model = new DleGameModel();
    }

    // Revient au menu principal
    public function index() {
        $posts = $this->model->readAll();
        require '../view/index.php';
    }

    public function creat(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imageFile = $_FILES['image']['tmp_name'];
                $image = file_get_contents($imageFile);
            }
            
            $name = $_POST['name'];
            $description = $_POST['description'];
            $userId = $_SESSION['userId'];
            echo "DEBUG befor calling model";
            $this->model->creat($name, $image, $description, $userId);
        }else{
            require '../view/dleGame/quizzCreate.php';
        }
    }
}
?>
