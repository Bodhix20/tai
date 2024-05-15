<?php
    // Inclure les fichiers nécessaires
    include_once __DIR__ . '/includes.php';

    // Vérifier si le formulaire de création de profil a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si les champs requis sont définis et non vides
        if (isset($_POST["longueur"]) && isset($_POST["materiau"]) && isset($_POST["etat"]) && isset($_POST["profile"])) {
            // Récupérer les données du formulaire
            $longueur = $_POST["longueur"];
            $materiau = $_POST["materiau"];
            $etat = $_POST["etat"];
            $profile = $_POST["profile"];

            // Créer une instance du modèle ProfileModel
            $profileModel = new ProfileModel();

            // Créer le profil en utilisant la méthode create_profile() du modèle
            $result = $profileModel->create_profile($longueur, $materiau, $etat, $profile);

            // Vérifier si la création du profil a réussi
            if ($result["success"]) {
                // Rediriger vers une autre page ou afficher un message de succès
                // Vous pouvez rediriger l'utilisateur vers une page de confirmation ou une autre page pertinente
                // header("Location: confirmation.php");
                // exit;
                echo "Profile created successfully!";
            } else {
                // Afficher un message d'erreur
                $error_message = $result["error"];
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register test</title>
    <style>
        /* Votre CSS ici */
        .loginFormContainer {
            /* Styles pour le formulaire */
        }
    </style>

    <script>
        window.onload = function(){
            // Écouteur d'événements JavaScript pour ouvrir la page createBrut.php lorsque le bouton est cliqué
            document.getElementById("testcreatebrut").addEventListener("click", function(){
                window.open('/view/php/testcreatebrut.php', '_self');
            });
        }
    </script>
</head>
<body>

    <!-- PHP only used to display stuff -->
    <?php include_header(); ?>

    <?php 
        // if an error happened
        if (isset($something_to_say)) {
            include_error_message($something_to_say);
        }
    ?>

    <form method="post" action="/profileController.php" class="loginFormContainer">
        <fieldset>
            <legend>Variable</legend>                
            <input type="text" placeholder="longueur" id="longueur" name="longueur">
            <input type="text" placeholder="materiau" id="materiau" name="materiau">
            <input type="text" placeholder="etat" id="etat" name="etat">
            <input type="text" placeholder="profile" id="profile" name="profile">
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php include_footer(); ?>

</body>
</html>