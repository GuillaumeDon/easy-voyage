
<?php
require_once __DIR__ . '/session.php';


// require ('../lib/functions.php');
// require_once('../models/ModelJourneys.php');
// require_once('../controllers/DateConversion.php');





$modelJourneys = new ModelJourneys();
$randomImage = $modelJourneys->selectRandomImage();

$template = 'home';
include '../views/base.phtml';
