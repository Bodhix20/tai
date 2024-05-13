<?php
    // Effectuez toutes les inclusions nécessaires en premier
    // __DIR__ vous permet d'utiliser des chemins relatifs de manière explicite
    require_once(__DIR__."/model/php/ProfileModel.php");

    if(isset($_POST['longueur']) && isset($_POST['materiau']) && isset($_POST['etat']) && isset($_POST['profile'])) {

        if(strlen($_POST['longueur']) > 0 && strlen($_POST['materiau']) > 0 && strlen($_POST['etat']) > 0 && strlen($_POST['profile']) > 0) {

            $profileModel = new ProfileModel();

            // Créez une instance du modèle ProfileModel
            $result = $profileModel->create_profile($_POST['longueur'], $_POST['materiau'], $_POST['etat'], $_POST['profile']);

            if($result['success']) {
                // Si le profil est créé avec succès, redirigez vers une autre page ou affichez un message de succès
                // Vous pouvez rediriger l'utilisateur vers une page de confirmation ou une autre page pertinente
                // header("Location: confirmation.php");
                // exit;
                echo "Profile created successfully!";
            } else {
                // Affichez un message d'erreur
                $error_message = $result['error'];
                // Vous pouvez inclure ce message d'erreur dans la page pour informer l'utilisateur sur ce qui s'est mal passé
                // include_error_message($error_message);
                echo "Error: $error_message";
            }
        } else {
            // Certains champs sont manquants
            echo "Error: Please fill in all required fields.";
        }
    }
?>