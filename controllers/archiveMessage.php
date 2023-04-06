<?php
// require_once '../models/MessageModel.php';

// if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
//     header("Location: unauthorized");
//     exit();
// }

// if (isset($_GET['id'])) {
//     $messageId = $_GET['id'];
//     $messageModel = new MessageModel();

//     // Archiver le message
//     $messageModel->transferMessageToArchive($messageId);

//     // Rediriger vers la liste des messages
//     header("Location: message");
//     exit();
// } else {
//     // Rediriger vers une page d'erreur si l'ID du message n'est pas défini
//     header("Location: error");
//     exit();
// }



if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: unauthorized");
    exit();
}

if (isset($_GET['id'])) {
    $messageId = $_GET['id'];
    $messageModel = new MessageModel();

    // Archiver le message
    $messageModel->transferMessageToArchive($messageId);

    // Rediriger vers la liste des messages
    header("Location: message");
    exit();
} else {
    // Rediriger vers une page d'erreur si l'ID du message n'est pas défini
    header("Location: error");
    exit();
}
