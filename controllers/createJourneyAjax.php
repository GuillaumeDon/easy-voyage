<?php
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {

header("Location: unauthorized");
exit();
}

$modelJourneys = new ModelJourneys();

$departures = $modelJourneys->getAllDepartures();
$categories = $modelJourneys->getAllCategories();
$countries = $modelJourneys->getAllCountries();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$journey_label = strip_tags($_POST['journey_label']);
$journey_title = strip_tags($_POST['journey_title']);
$journey_description = strip_tags($_POST['journey_description']);
$journey_duration = strip_tags($_POST['journey_duration']);
$journey_price = strip_tags($_POST['journey_price']);
$hostel_title = strip_tags($_POST['hostel_title']);
$hostel_description = strip_tags($_POST['hostel_description']);
$hostel_picture = strip_tags($_POST['hostel_picture']);
$circuit_title = strip_tags($_POST['circuit_title']);
$circuit_description = strip_tags($_POST['circuit_description']);
$circuit_picture = strip_tags($_POST['circuit_picture']);
$formalities = strip_tags($_POST['formalities']);
$departure_id = strip_tags($_POST['departure_id']);
$category_id = strip_tags($_POST['category_id']);
$country_id = strip_tags($_POST['country_id']);


if (!empty($journey_label) && !empty($journey_title) && !empty($journey_description) && !empty($journey_duration) && !empty($journey_price) && !empty($hostel_title) && !empty($hostel_description) && !empty($hostel_picture) && !empty($circuit_title) && !empty($circuit_description) && !empty($circuit_picture) && !empty($formalities) && !empty($departure_id) && !empty($category_id) && !empty($country_id)) {


$modelJourneys->insertJourney($journey_label, $journey_title, $journey_description, $journey_duration, $journey_price, $hostel_title, $hostel_description, $hostel_picture, $circuit_title, $circuit_description, $circuit_picture, $formalities, $departure_id, $category_id, $country_id);
echo json_encode(['success' => true]);


        exit;
}




     else {
        echo json_encode(['error' => 'Identifiants invalides!']);
        exit;
    }
}