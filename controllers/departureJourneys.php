<?php

$modelJourneys = new ModelJourneys();

if (isset($_GET['departure_id'])) {
    $departure_id = $_GET['departure_id'];
    $journeys = $modelJourneys->getJourneysByDepartureId($departure_id);
} else {

    header("Location: home");
    exit();
}

$journeys_pictures = [];
foreach ($journeys as $journey) {
    $journeys_pictures[$journey['id']] = $modelJourneys->getPicturesByJourneyId($journey['id']);
}

$template = "departureJourneys";
include "../views/base.phtml";
