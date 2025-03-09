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
        $quizzes = $this->model->readAll();
        require '../view/index.php';
    }


    //creation d'un nouveau quizz
    public function creat(){
        if(!isset($_SESSION['userId'])){//si l'utilisateur n'est pas connecter affiche la page de connexion
            header("Location: ". URL_USER_LOGIN);
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {//ajout l'image si elle est donnée
                $imageFile = $_FILES['image']['tmp_name'];
                $image = file_get_contents($imageFile);
            }
            
            $name = $_POST['name'];
            $description = $_POST['description'];
            $userId = $_SESSION['userId'];
            $this->model->creat($name, $image, $description, $userId);
            header("Location: ". URL_QUIZZES_DISPLAY_USER);
        }else{
            require '../view/dleGame/quizzCreate.php';
        }
    }

    //affichage des quizz d'un utilisateur
    public function displayQuizzUser(){
        if(isset($_SESSION['userId'])){
            $quizzes = $this->model->readByUserId($_SESSION['userId']);
            require '../view/dleGame/quizzDisplayUser.php';
        }else{
            header("Location: ". URL_USER_LOGIN);
        }
    }

    //modification d'un quizz
    public function updateQuizz(){
        if(!isset($_GET['quizzId']) && empty($_GET['quizzId'])){//retour a l'affichage si aucun quizz n'est donnée
            header("Location: ". URL_QUIZZES_DISPLAY_USER);
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['name']) || !empty($_POST['name']) ||
            isset($_POST['description']) || !empty($_POST['description'])){ // verification de la validité des donnée

                $name = $_POST['name'];
                $description = $_POST['description'];

                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {//modifie l'image si elle est donnée avec
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
        $quizz = $this->model->readQuizzById($_GET['quizzId']);
        require '../view/dleGame/quizzUpdate.php';
    }

    //suppression d'un quiz
    public function deleteQuizz(){
        if(!isset($_GET['quizzId']) && empty($_GET['quizzId'])){
            header("Location: ". URL_QUIZZES_DISPLAY_USER);
            exit();
        }
        $quizz = $this->model->readQuizzById($_GET['quizzId']);
        if(isset($_SESSION['userId']) && $_SESSION['userId'] == $quizz['USER_   ID']){//refu si l'utilisateur n'est pas le createur du quizz
            $this->model->deletById($_GET['quizzId']);
        }else{
            echo "error you don't own this quizz";
            exit();
        }
        header("Location: ". URL_QUIZZES_DISPLAY_USER);
    }

    public function playQuizz(){
        if(!isset($_GET['quizzId']) && empty($_GET['quizzId'])){
            header("Location: ". URL_QUIZZES_DISPLAY_ALL);
            exit();
        }
        //$entityes = $this->model->getFullEntitesOfQuizzById($_GET['quizzId']);
        require "../view/dleGame/quizzGame.php";
    }

    public function manageQuizz(){
        if(!isset($_GET['quizzId']) && empty($_GET['quizzId'])){
            header("Location: ". URL_QUIZZES_DISPLAY_ALL);
            exit();
        }
        if($this->userIsOwner($_GET['quizzId'])){
            require "../view/dleGame/quizzManager.php";
        }else{
            echo "error you don't own this quizz";
            exit();
        }
    }

    /* FONCTION D'UTILITAIRE D'ACTION */
    public function userIsOwner($idQuizz){
        $quizz = $this->model->readQuizzById($idQuizz);
        return isset($_SESSION['userId']) && $quizz['USER_ID'] == $idQuizz;
    }
}
?>
