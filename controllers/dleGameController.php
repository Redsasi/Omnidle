<?php
// controllers/UserController.php

require_once '../models/dleGameModel.php';

class dleGameController {
    private $model;

    public function __construct() {
        $this->model = new DleGameModel();
    }

    public function displayHeader(){
        if(isset($_SESSION["userId"])){
            require '../view/layout/headerLogin.php';
        }else{
            require '../view/layout/headerLogout.php';
        }
    }
    
    // Revient au menu principal
    public function index() {
        $this->displayHeader();
        $quizzes = $this->model->readAll();
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
            $this->model->creat($name, $image, $description, $userId);
        }else{
            $this->displayHeader();
            require '../view/dleGame/quizzCreate.php';
        }
    }

    public function displayQuizzUser(){
        if(isset($_SESSION['userId'])){
            $this->displayHeader();
            $quizzes = $this->model->readByUserId($_SESSION['userId']);
            require '../view/dleGame/quizzDisplayUser.php';
        }else{
            header("Location: ". URL_USER_LOGIN);
        }
    }
    public function updateQuizz(){
        if(!isset($_GET['quizzId']) && empty($_GET['quizzId'])){
            header("Location: ". URL_QUIZZES_DISPLAY_USER);
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['name']) || !empty($_POST['name']) ||
            isset($_POST['description']) || !empty($_POST['description'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $imageFile = $_FILES['image']['tmp_name'];
                    $image = file_get_contents($imageFile);
                    $this->model->updateByIdImage($_GET['quizzId'], $name, $image, $description);
                }else{
                    $this->model->updateById($_GET['quizzId'], $name, $description);
                }
                header("Location: ". URL_QUIZZES_DISPLAY_USER);
                exit();
            }
            
        }
        $this->displayHeader();
        $quizz = $this->model->readQuizzById($_GET['quizzId']);
        require '../view/dleGame/quizzUpdate.php';
    }

    public function deleteQuizz(){
        if(!isset($_GET['quizzId']) && empty($_GET['quizzId'])){
            header("Location: ". URL_QUIZZES_DISPLAY_USER);
            exit();
        }
        $quizz = $this->model->readQuizzById($_GET['quizzId']);
        if(isset($_SESSION['userId']) && $_SESSION['userId'] == $quizz['USER_ID']){
            $this->model->deletById($_GET['quizzId']);
        }else{
            echo "ERROR you don't own this quizz";
            exit();
        }
        header("Location: ". URL_QUIZZES_DISPLAY_USER);
    }
}
?>
