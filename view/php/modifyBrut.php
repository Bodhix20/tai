<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/tai/tai_app_2023_2024_caterpillar/project/view/css/example.css">
        <title>Welcome</title>
    </head>
    <body>

    <?php

        require_once(__DIR__.'/includes.php');
        include_header(); 
        
        // if an error happened
        if (isset($something_to_say)) {
            include_error_message($something_to_say);
        }

        // Check if the document ID is set in the POST data
        if(isset($_POST['Modifier'])) {
            // Perform necessary includes
            require_once(__DIR__ . "/../../model/php/DBModelmesbruts.php");

            // Create an instance of the DocumentModel
            $documentModel = new DocumentModel();

            // Fetch the current settings for the document corresponding to the provided ID
            $documentId = $_POST['Modifier'];
            $currentSettings = $documentModel->getDocumentSettingsById($documentId);

            if($currentSettings) {
                // Prepopulate the dropdown menus and textboxes with the current settings
                $profileOptions = array("Profile circulaire", "Profile circulaire creux", "Profile rectangulaire", "Profile rectangulaire creux", "Profile en I", "Profile en T", "Profile en U");
                $lengthValue = $currentSettings['longueur'];
                $materialOptions = array("Acier", "Acier inoxydable", "Aluminium");
                $selectedProfile = $currentSettings['profile'];
                $selectedMaterial = $currentSettings['materiau'];

                // Include the form with prepopulated values
                //include_once __DIR__ . '/modifyBrutForm.php';
            } else {
                // If document not found, display an error message
                echo "Error: Document not found.";
            }
        } else {
            // If document ID is not set, display an error message
            echo "Error: Document ID is not provided.";
        }
    ?>  

    <h3>Modify Brut</h3>

    <form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/modifyBrutController.php">
        <div>
            <p name="idProfile" value="<?php echo $_POST['Modifier'] ?>">Identifiant profilé : <?php echo $_POST['Modifier'] ?></p>
            <input type="hidden" name="idProfile" value="<?php echo htmlspecialchars($documentId); ?>">
            <label for="profile">Profile:</label>
            <select name="profile" id="profile">
                <?php
                foreach($profileOptions as $index => $profile) {
                    $selected = ($index == $selectedProfile) ? 'selected' : '';
                    echo "<option value=\"$index\" $selected>$profile</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="length">Length:</label>
            <input type="text" id="length" name="length" placeholder="Enter length" value="<?php echo $lengthValue; ?>">
        </div>
        <div>
            <label for="material">Material:</label>
            <select name="material" id="material">
                <?php
                foreach($materialOptions as $index => $material) {
                    $selected = ($index == $selectedMaterial) ? 'selected' : '';
                    echo "<option value=\"$index\" $selected>$material</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Modify">
        </div>
    </form> 

    </body>
</html>
