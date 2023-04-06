<?php


$journey_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$modelJourneys = new ModelJourneys();
$journey = $modelJourneys->getJourneyById($journey_id);


$journeys_pictures = [];
foreach ($journey as $jour) {
    $journeys_pictures[$journey['id']] = $modelJourneys->getPicturesByJourneyId($journey['id']);
}




$template = 'readJourneysCustomer';
include '../views/base.phtml';










