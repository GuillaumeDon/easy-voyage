<?php

$messageModel = new MessageModel();

$messageId = $_GET['id'];
$messageModel->deleteMessageById($messageId);

header("Location: message");
