<?php

$modelJourneys = new ModelJourneys();
// Récupére l'ID du pays à partir de l'URL
$country_id = isset($_GET['country_id']) ? intval($_GET['country_id']) : 0;


// Récupérez les informations du pays
$country = $modelJourneys->getCountryById($country_id);

// Récupére les voyages associés au pays
$journeys = $modelJourneys->getJourneysByCountryId($country_id);
$journeys_pictures = [];
foreach ($journeys as $journey) {
    $journeys_pictures[$journey['id']] = $modelJourneys->getPicturesByJourneyId($journey['id']);
}


$template = 'countryJourneys';
include '../views/base.phtml';
