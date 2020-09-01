<?php
ob_start();

use controller\userController;

include 'controller/userController.php';


$userController = new UserController();
$userController->handleRequest();






