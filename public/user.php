<?php
// Controller frontal (Routeur)
require_once '../helpers/routeHelper.php';
require_once '../controllers/BlogController.php';

$controller = new UserController();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case ACTION_CREATE_USER:
            $controller->create();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
?>
