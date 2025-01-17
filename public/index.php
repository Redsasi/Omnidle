<script type="text/javascript" src="../public/js/popup.js"></script>
<?php
session_start();
// Controller frontal (Routeur)
require_once '../helpers/routesHelper.php';
require_once '../controllers/userController.php';
require_once '../controllers/dleGameController.php';



$userControl = new UserController();
$dleGameControl = new dleGameController();



if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case ACTION_USER_SINGUP:
            $userControl->singUp();
            break;

        case ACTION_USER_LOGIN:
            $userControl->login();
            break;

        case ACTION_USER_LOGOUT:
            $userControl->logout();
            break;

        case ACTION_QUIZZES_CREATE:
            $dleGameControl->creat();
            break;

        case ACTION_QUIZZES_DISPLAY_USER:
            $dleGameControl->displayQuizzUser();
            break;

        case ACTION_QUIZZES_UPDATE:
            $dleGameControl->updateQuizz();
            break;

        case ACTION_QUIZZES_DELETE:
            $dleGameControl->deleteQuizz();
            break;

        case ACTION_QUIZZES_PLAY:
            $dleGameControl->playQuizz();
            break;

        case ACTION_GET_QUIZZES_PAGE:
            $dleGameControl->getQuizzPage();
            break;

        case ACTION_QUIZZES_DISPLAY_ALL:
        default:
            $dleGameControl->index();
            break;
    }
} else {
    $dleGameControl->index();
}
