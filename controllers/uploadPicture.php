<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: unauthorized");
    exit();
}

$modelJourneys = new ModelJourneys();
$journey_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$journey = $modelJourneys->getJourneyById($journey_id);
// var_dump($journey_id);

if (isset($_POST['submit'])) {
    // $journey_id = $_POST['journey_id'];
    $file = $_FILES['picture'];
    $target_dir = "../public/img/country/";

    $filename = basename($file["name"]);
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifie si le fichier est une image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }

    // Vérifie si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Autorise certains formats de fichier
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifie si $uploadOk est défini sur 0 par une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "Le fichier " . htmlspecialchars(basename($file["name"])) . " a été téléchargé.";
            $modelJourneys->addPicture($journey_id, $filename);
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}

$template = 'uploadPicture';
include '../views/base.phtml';
