<?php

$userModel = new ModelUsers();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = strip_tags($_POST['firstname']);
    //ajouter un trim
    $lastname = strip_tags($_POST['lastname']);
    $email = strip_tags($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {
        // vérifie si le mail existe dans la BDD
        $user = $userModel->getUserByEmail($email);

    } else {
        echo json_encode(['errorPass'=>'Les mots de passe sont différents']);
        exit;
       
    }
        if ($user) {
            
            echo json_encode(['errorMail'=>'Le mail existe déjà!']);
            
            exit();
        }


        if($firstname !=null && $lastname != null && $email !=null && $password !=null && $password_confirm != null){
        $userModel->register($firstname, $lastname, $email, $password);
        echo json_encode(['success'=>true]);
        
    } else {
        echo json_encode(['error'=>'Identifiants invalides!']);
        exit;
       
    }

    
    

}

