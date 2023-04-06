<?php
require_once "AbstractModel.php";
class ModelJourneys extends AbstractModel
{



    public function getAllJourneys()
    {
        $connection = $this->db->connect();
        $query = "CALL get_all_journeys_with_labels()";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getJourneyById($id)
    {
        $connection = $this->db->connect();
        $query = "CALL get_journey_by_id(:id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function deleteJourneyById($id)
    {
        $connection = $this->db->connect();
        $query = "CALL delete_journey_by_id(:id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }



    public function selectRandomImage()
    {
        $connection = $this->db->connect();
        $query = "CALL select_random_image()";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function insertJourney($journey_label, $journey_title, $journey_description, $journey_duration, $journey_price, $hostel_title, $hostel_description, $hostel_picture, $circuit_title, $circuit_description, $circuit_picture, $formalities, $departure_id, $category_id, $country_id)
    {
        $connection = $this->db->connect();
        $query = "CALL insert_journey(:journey_label, :journey_title, :journey_description, :journey_duration, :journey_price, :hostel_title, :hostel_description, :hostel_picture, :circuit_title, :circuit_description, :circuit_picture, :formalities, :departure_id, :category_id, :country_id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':journey_label', $journey_label);
        $statement->bindParam(':journey_title', $journey_title);
        $statement->bindParam(':journey_description', $journey_description);
        $statement->bindParam(':journey_duration', $journey_duration);
        $statement->bindParam(':journey_price', $journey_price);
        $statement->bindParam(':hostel_title', $hostel_title);
        $statement->bindParam(':hostel_description', $hostel_description);
        $statement->bindParam(':hostel_picture', $hostel_picture);
        $statement->bindParam(':circuit_title', $circuit_title);
        $statement->bindParam(':circuit_description', $circuit_description);
        $statement->bindParam(':circuit_picture', $circuit_picture);
        $statement->bindParam(':formalities', $formalities);
        $statement->bindParam(':departure_id', $departure_id);
        $statement->bindParam(':category_id', $category_id);
        $statement->bindParam(':country_id', $country_id);

        $statement->execute();
    }


    public function updateJourney($id, $journey_label, $journey_title, $journey_description, $journey_duration, $journey_price, $hostel_title, $hostel_description, $hostel_picture, $circuit_title, $circuit_description, $circuit_picture, $formalities, $departure_id, $category_id, $country_id)
    {
        $connection = $this->db->connect();
        $query = "CALL UpdateJourney(:id, :journey_label, :journey_title, :journey_description, :journey_duration, :journey_price, :hostel_title, :hostel_description, :hostel_picture, :circuit_title, :circuit_description, :circuit_picture, :formalities, :departure_id, :category_id, :country_id)";
        $statement = $connection->prepare($query);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':journey_label', $journey_label, PDO::PARAM_STR);
        $statement->bindParam(':journey_title', $journey_title, PDO::PARAM_STR);
        $statement->bindParam(':journey_description', $journey_description, PDO::PARAM_STR);
        $statement->bindParam(':journey_duration', $journey_duration, PDO::PARAM_STR);
        $statement->bindParam(':journey_price', $journey_price, PDO::PARAM_INT);
        $statement->bindParam(':hostel_title', $hostel_title, PDO::PARAM_STR);
        $statement->bindParam(':hostel_description', $hostel_description, PDO::PARAM_STR);
        $statement->bindParam(':hostel_picture', $hostel_picture, PDO::PARAM_STR);
        $statement->bindParam(':circuit_title', $circuit_title, PDO::PARAM_STR);
        $statement->bindParam(':circuit_description', $circuit_description, PDO::PARAM_STR);
        $statement->bindParam(':circuit_picture', $circuit_picture, PDO::PARAM_STR);
        $statement->bindParam(':formalities', $formalities, PDO::PARAM_STR);
        $statement->bindParam(':departure_id', $departure_id, PDO::PARAM_INT);
        $statement->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $statement->bindParam(':country_id', $country_id, PDO::PARAM_INT);

        $statement->execute();
    }

    public function addPicture($journey_id, $picture_path)
    {
        $connection = $this->db->connect();
        $query = "CALL add_picture(:journey_id, :picture)";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':journey_id', $journey_id, PDO::PARAM_INT);
        $stmt->bindParam(':picture', $picture_path, PDO::PARAM_STR);
        $stmt->execute();
    }


    public function getAllDepartures()
    {
        $connection = $this->db->connect();
        $query = "CALL get_all_departures()";
        $statement = $connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllCategories()
    {
        $connection = $this->db->connect();
        $query = "CALL get_all_categories()";
        $statement = $connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllCountries()
    {
        $connection = $this->db->connect();
        $query = "CALL get_all_countries()";
        $statement = $connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getContinentsWithCountries()
    {
        $sql = "CALL GetContinentsWithCountries()";
        $connection = $this->db->connect();
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $continents = [];
        foreach ($result as $row) {
            if (!isset($continents[$row['continent_id']])) {
                $continents[$row['continent_id']] = [
                    'continent_label' => $row['continent_name'],
                    'countries' => []
                ];
            }
            $continents[$row['continent_id']]['countries'][] = [
                'id' => $row['country_id'],
                'name' => $row['country_name']
            ];
        }

        return array_values($continents);
    }





    public function getCountryById()
    {
        $connection = $this->db->connect();
        $query = "CALL GetCountryById(:id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getJourneysByCountryId($country_id)
    {
        $connection = $this->db->connect();
        $query = "CALL GetJourneysByCountryId(:country_id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':country_id', $country_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getJourneysByCategoryId($category_id)
    {
        $connection = $this->db->connect();
        $query = "CALL GetJourneysByCategoryId(:category_id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function getJourneysByDepartureId($departure_id)
    {
        $connection = $this->db->connect();
        $query = "CALL GetJourneysByDepartureId(:departure_id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':departure_id', $departure_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPicturesByJourneyId($journey_id)
    {
        $connection = $this->db->connect();
        $query = "CALL GetPicturesByJourneyId(:journey_id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':journey_id', $journey_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
