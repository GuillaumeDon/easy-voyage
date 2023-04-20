<?php
$userModel = new ModelUsers();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $user = $userModel->getUserByEmail($email);

    if ($user && password_verify($password, $user['pass'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['user_firstname'] = $user['firstname'];

        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['error' => 'Identifiants invalides!']);
        exit;
    }
}
