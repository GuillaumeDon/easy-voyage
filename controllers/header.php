<?php

// require_once('../models/ModelJourneys.php');
$modelJourneys = new ModelJourneys();

$categories = $modelJourneys->getAllCategories();
$departures = $modelJourneys->getAllDepartures();
$countries = $modelJourneys->getCountryById();

$continents = $modelJourneys->getContinentsWithCountries();

require('..\views\header.phtml');