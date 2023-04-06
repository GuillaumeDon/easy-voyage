<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: unauthorized");
    exit();
}

$journey_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$modelJourneys = new ModelJourneys();
$journey = $modelJourneys->getJourneyById($journey_id);


$template = 'readJourney';
include '../views/base.phtml';
