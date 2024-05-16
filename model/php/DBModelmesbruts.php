<?php

require_once 'DBModel.php'; // Inclure la classe DBModel

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
    // D'autres méthodes spécifiques pour interagir avec les documents peuvent être ajoutées ici
}

?>
