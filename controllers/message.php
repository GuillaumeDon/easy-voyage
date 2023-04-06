
<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: unauthorized");
    exit();
}

$messageModel = new MessageModel();
$messages = $messageModel->getAllMessagesWithUserDetails();



$template = 'message';
include '../views/base.phtml';