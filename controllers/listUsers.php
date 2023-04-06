<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: unauthorized");
    exit();
}

$userModel = new ModelUsers();
$users = $userModel->getAllUsers();
$template = 'listUsers';
include '../views/base.phtml';