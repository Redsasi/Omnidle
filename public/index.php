<?php
session_start();
// Controller frontal (Routeur)
require_once '../helpers/routesHelper.php';
require_once '../controllers/userController.php';
require_once '../controllers/dleGameController.php';

$UserControl = new UserController();
$dleGameControl = new dleGameController();



if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case ACTION_USER_SINGUP:
            $UserControl->singUp();
            break;
        case ACTION_USER_LOGIN:
            $UserControl->login();
            break;
        default:
            $dleGameControl->index();
            break;
    }
} else {
    $dleGameControl->index();
}

