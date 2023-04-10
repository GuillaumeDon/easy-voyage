
<?php

require_once __DIR__ . '/session.php';

$modelJourneys = new ModelJourneys();
$randomImage = $modelJourneys->selectRandomImage();

$template = 'home';
include '../views/base.phtml';
