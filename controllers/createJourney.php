<?php

$modelJourneys = new ModelJourneys();

$departures = $modelJourneys->getAllDepartures();
$categories = $modelJourneys->getAllCategories();
$countries = $modelJourneys->getAllCountries();

$template = 'createJourney';
include '../views/base.phtml';
