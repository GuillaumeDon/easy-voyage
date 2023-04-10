<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: unauthorized");
    exit();
}

$messageModel = new MessageModel();

$messageId = $_GET['id'];
$message = $messageModel->getMessageById($messageId);

// Ajoute l'ID du message au tableau $message
$message['id'] = $messageId;

$template = 'readMessage';
include "../views/base.phtml";
