<?php

require_once (__DIR__."/DBModel.php"); // Inclure la classe DBModel

class DocumentModel extends DBModel {

    /**
     * Méthode pour récupérer les documents correspondant à l'id_createur de la session active
     *
     * @param int $id_createur L'ID du créateur de session
     * @return array|null Le résultat de la requête sous forme d'un tableau associatif, ou null s'il n'y a pas de résultats
     */
    public function getDocumentsByCreatorId($id_createur) {
        // Requête SQL pour sélectionner les documents correspondant à l'id_createur donné
        $sql = "SELECT * FROM document WHERE id_createur = :id_createur";
        // Paramètres de la requête
        $params = array(':id_createur' => $id_createur);

        // Appel de la méthode fetchAll de la classe parente pour exécuter la requête et récupérer les résultats
        return $this->fetchAll($sql, $params);
    }

    public function fetchAll($sql, $params = []) {
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Error executing query: " . $e->getMessage());
        }
    }

    public function deleteDocument($documentId)
    {
        try {
            // Prepare the SQL statement
            $statement = $this->db->prepare("DELETE FROM document WHERE id = :documentId");
            
            // Bind parameters
            $statement->bindParam(':documentId', $documentId, PDO::PARAM_INT);
            
            // Execute the statement
            $result = $statement->execute();
            
            // Return true if the deletion was successful
            return $result;
        } catch (PDOException $e) {
            // Handle any potential exceptions or errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getDocumentSettingsById($documentId)
{
    try {
        // Prepare the SQL statement
        $statement = $this->db->prepare("SELECT * FROM document WHERE id = :documentId");
        
        // Bind parameters
        $statement->bindParam(':documentId', $documentId, PDO::PARAM_INT);
        
        // Execute the statement
        $statement->execute();
        
        // Fetch the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        // Return the result
        return $result;
    } catch (PDOException $e) {
        // Handle any potential exceptions or errors
        echo "Error: " . $e->getMessage();
        return false;
    }}

    public function updateDocumentSettings($documentId, $profile, $length, $material) {
        try {
            $sql = "UPDATE document SET profile = :profile, longueur = :length, materiau = :material WHERE id = :documentId";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':documentId', $documentId, PDO::PARAM_INT);
            $statement->bindParam(':profile', $profile, PDO::PARAM_INT);
            $statement->bindParam(':length', $length, PDO::PARAM_INT);
            $statement->bindParam(':material', $material, PDO::PARAM_INT);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateDocumentState($documentId, $newState) {
        try {
            $statement = $this->db->prepare("UPDATE document SET etat = :newState WHERE id = :documentId");
            $statement->bindParam(':documentId', $documentId, PDO::PARAM_INT);
            $statement->bindParam(':newState', $newState, PDO::PARAM_INT);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // D'autres méthodes spécifiques pour interagir avec les documents peuvent être ajoutées ici
}

?>
