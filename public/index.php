<?php
// Controller frontal (Routeur)
require_once '../helpers/routesHelper.php';
require_once '../controllers/userController.php';
require_once '../controllers/dleGameController.php';

$UserControl = new UserController();
$dleGameControl = new dleGameController();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case ACTION_CREATE_USER:
            $UserControl->create();
            break;
        default:
            $dleGameControl->index();
            break;
    }
} else {
    $dleGameControl->index();
}
?>
