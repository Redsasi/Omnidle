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
                
        case ACTION_DLEGAME_CREATE:
            $dleGameControl->creat();
            break;

        default:
            $dleGameControl->index();
            break;
    }
} else {
    $dleGameControl->index();
}

