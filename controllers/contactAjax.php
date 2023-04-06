<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $messageModel = new MessageModel();

    $user_id = $_SESSION['user_id'];
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    if ($title != null && $content != null) {
        $messageModel->createMessage($user_id, $title, $content);


        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['error' => 'Identifiants invalides!']);
        exit;
    }
}
