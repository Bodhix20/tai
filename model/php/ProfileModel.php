<?php

require_once("DBModel.php");

class ProfileModel extends DBModel {

    /**
     * Crée un nouveau profil dans la base de données
     */
    function create_profile(string $longueur, string $materiau, string $etat, string $profile) {
        $result = [];

        if (!$this->connected) {
            // Gestion des erreurs de connexion à la base de données
            return $result;
        }

        // Préparer la requête SQL pour insérer un nouveau profil dans la base de données
        $request = "INSERT INTO document (longueur, materiau, etat, profile) VALUES (:longueur, :materiau, :etat, :profile)";
        $statement = $this->db->prepare($request);

        // Exécuter la requête SQL, en liant les paramètres pour éviter les injections SQL
        $success = $statement->execute([
            "longueur" => $longueur,
            "materiau" => $materiau,
            "etat" => $etat,
            "profile" => $profile
        ]);

        // Vérifier si le profil a été inséré avec succès
        if ($success) {
            $result["success"] = true;
        } else {
            $result["error"] = "Failed to create profile. Please try again.";
        }

        return $result;
    }

    // Autres méthodes pour interagir avec la base de données pour gérer les profils
    // Par exemple, méthodes pour supprimer un profil, mettre à jour un profil, récupérer tous les profils, etc.

}
?>