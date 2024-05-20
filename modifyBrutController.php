<?php
// Perform any necessary includes first
require_once(__DIR__."/model/php/DBModelmesbruts.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['profile'], $_POST['length'], $_POST['material'])) {
        // Create an instance of the DocumentModel
        $documentModel = new DocumentModel();

        // Update document settings in the database
        $result = $documentModel->updateDocumentSettings(
            $_POST['idProfile'],
            $_POST['profile'], 
            $_POST['length'], 
            $_POST['material']
        );

        if($result) {
            // Settings updated successfully
            // Redirect to a success page or display a success message
            $something_to_say = "Mise à jour des informations complétée avec succès";
            include_once __DIR__ . '/controleurmesbruts.php';
            exit();
        } else {
            // Display an error message if update fails
            $something_to_say = "Echec de la mise a jour des informations";
            include_once __DIR__ . '/controleurmesbruts.php';
            exit();
        }
    } else {
        // Some required fields are missing
        $something_to_say = "Error: Please fill in all required fields.";
        include_once __DIR__ . '/modifyBrut.php';
        exit();
    }
} else {
    // If the form is not submitted, redirect back to the modifyBrut.php page
    header("Location: modifyBrut.php");
    exit();
}
?>