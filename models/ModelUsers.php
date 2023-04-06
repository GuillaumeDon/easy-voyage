<?php

require_once "AbstractModel.php";

class ModelUsers extends AbstractModel
{



    public function getAllUsers()
    {
        $connection = $this->db->connect();
        $query = "CALL get_all_users()";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

   
    public function register($firstname, $lastname, $email, $password)
    {
        $connection = $this->db->connect();
        $query = "CALL RegisterUser(:firstname, :lastname, :email, :password)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $statement->execute();
    }


    public function getUserByEmail($email)
    {
        $connection = $this->db->connect();
        $query = "CALL GetUserByEmail(:email)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
