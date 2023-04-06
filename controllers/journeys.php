
<?php

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: unauthorized");
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$modelJourneys = new ModelJourneys();

switch ($action) {
    case 'read':
        $journey_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $journey = $modelJourneys->getJourneyById($journey_id);
        $template = 'readJourney';
        break;
    case 'edit':
        $journey_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $journey = $modelJourneys->getJourneyById($journey_id);
        $template = 'editJourney';
        break;
    case 'update':
        $id = intval($_POST['id']);
        $journey_label = strip_tags($_POST['journey_label']);
        $journey_title = strip_tags($_POST['journey_title']);
        $journey_description = strip_tags($_POST['journey_description']);
        $journey_duration = strip_tags($_POST['journey_duration']);
        $journey_price = intval(strip_tags($_POST['journey_price']));
        $hostel_title = strip_tags($_POST['hostel_title']);
        $hostel_description = strip_tags($_POST['hostel_description']);
        $hostel_picture = strip_tags($_POST['hostel_picture']);
        $circuit_title = strip_tags($_POST['circuit_title']);
        $circuit_description = strip_tags($_POST['circuit_description']);
        $circuit_picture = strip_tags($_POST['circuit_picture']);
        $formalities = strip_tags($_POST['formalities']);
        $departure_id = intval(strip_tags($_POST['departure_id']));
        $category_id = intval(strip_tags($_POST['category_id']));
        $country_id = intval(strip_tags($_POST['country_id']));
        $modelJourneys->updateJourney($id, $journey_label, $journey_title, $journey_description, $journey_duration, $journey_price, $hostel_title, $hostel_description, $hostel_picture, $circuit_title, $circuit_description, $circuit_picture, $formalities, $departure_id, $category_id, $country_id);
        header('Location: journeys');
        exit;
        break;

    // case 'uploadPicture':
    //     require 'controllers/uploadPicture';
    //     break;


    case 'delete':
        $journey_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $modelJourneys->deleteJourneyById($journey_id);
        header('Location: journeys'); // Redirige vers la liste des voyages après la suppression
        exit;
        break;




    default: // list
        $journeys = $modelJourneys->getAllJourneys();
        $template = 'journeys';
}



include '../views/base.phtml';
