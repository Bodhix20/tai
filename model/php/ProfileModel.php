<?php

require_once("DBModel.php");

class ProfileModel extends DBModel {

    /**
     * Inserts data into the document table
     *
     * @param int $id_createur The ID of the creator
     * @param int $id_validateur The ID of the validator
     * @param int $profile The profile ID
     * @param int $longueur The length
     * @param int $materiau The material ID
     * @param int $etat The state ID
     * @return bool true if insertion successful, false otherwise
     */
    public function createProfile($id_createur, $id_validateur, $profile, $longueur, $materiau, $etat) {
        if (!$this->connected) {
            // Cannot insert if not connected to the database
            return false;
        }

        try {
            // Prepare SQL statement
            $statement = $this->db->prepare("INSERT INTO document (id_createur, id_validateur, profile, longueur, materiau, etat) VALUES (?, ?, ?, ?, ?, ?)");

            // Bind parameters
            $statement->bindParam(1, $id_createur, PDO::PARAM_INT);
            $statement->bindParam(2, $id_validateur, PDO::PARAM_INT);
            $statement->bindParam(3, $profile, PDO::PARAM_INT);
            $statement->bindParam(4, $longueur, PDO::PARAM_INT);
            $statement->bindParam(5, $materiau, PDO::PARAM_INT);
            $statement->bindParam(6, $etat, PDO::PARAM_INT);

            // Execute the statement
            $result = $statement->execute();

            return $result;
        } catch (PDOException $e) {
            // Handle exceptions if insertion fails
            die("Error inserting document: " . $e->getMessage());
        }
    }
}

?>