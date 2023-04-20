<?php
//Démarrer la session
require_once "../controllers/session.php";

// Inclusion des dépendances
include '../lib/functions.php';
include '../app/config.php';
include '../app/routes.php';
include '../app/Environnement.php';
include '../src/Core/Database.php';
include '../models/AbstractModel.php';
include '../models/MessageModel.php';
include '../models/ModelJourneys.php';
include '../models/ModelUsers.php';
include '../controllers/DateConversion.php';



$env = new Environnement('../app/config.php');


// Inclusion du fichier de routes
$routes = include '../app/routes.php';

$page = $env->getURL($_SERVER["REDIRECT_URL"]);

if(!$page){
    $page='home';
}


// Si la page n'existe pas on fait une erreur 404
if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    // echo 'Page introuvable';
    header("Location: home");
    exit;
}

// On va chercher le contrôleur associé à la page
$controllerFile = $routes[$page];
include '../Controllers/' . $controllerFile;
