<?php
require_once "AbstractModel.php";

class MessageModel extends AbstractModel
{
    public function getAllMessagesWithUserDetails()
    {
        // Connexion à la base de données
        $connection = $this->db->connect();
        // Préparation de la requête SQL pour appeler la procédure stockée
        $query = "CALL get_all_messages_with_user_details()";
         // Préparation de l'objet PDOStatement en utilisant la requête SQL
        $statement = $connection->prepare($query);
        // Exécution de la requête
        $statement->execute();
        // Récupération de tous les résultats de la requête sous forme d'un tableau associatif
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function getMessageById($id)
    {
        $connection = $this->db->connect();
        $query = "CALL get_message_by_id(:id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }



    

    public function deleteMessageById($id)
    {
        $connection = $this->db->connect();
        $query = "CALL delete_message_by_id(:id)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

//     CREATE PROCEDURE delete_message_by_id(IN messageId INT)
// BEGIN
//   DELETE FROM message WHERE id = messageId;
// END;CREATE PROCEDURE delete_message_by_id(IN messageId INT)
// BEGIN
//   DELETE FROM message WHERE id = messageId;
// END;

    public function createMessage($user_id, $title, $content)
    {
        $connection = $this->db->connect();
        $query = "CALL createMessage(:user_id, :title, :content)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':content', $content, PDO::PARAM_STR);
        $statement->execute();
    }


    public function transferMessageToArchive($messageId)
    {
        $connection = $this->db->connect();
        $query = "CALL TransferMessageToArchive(:messageId)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':messageId', $messageId, PDO::PARAM_INT);
        $statement->execute();
    }
}
