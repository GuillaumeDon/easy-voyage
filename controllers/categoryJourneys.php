<?php

$modelJourneys = new ModelJourneys();

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $journeys = $modelJourneys->getJourneysByCategoryId($category_id);
} else {
    
    header("Location: home");
    exit();
}

$journeys_pictures = [];
foreach ($journeys as $journey) {
    $journeys_pictures[$journey['id']] = $modelJourneys->getPicturesByJourneyId($journey['id']);
}

$template = "categoryJourneys";
include "../views/base.phtml";
