<?php

// Include the DocumentModel class
require_once(__DIR__.'/model/php/DBModelMesBruts.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Supprimer'])) {
    // Check if the document ID is set and not empty
    if (isset($_POST['Supprimer']) && !empty($_POST['Supprimer'])) {
        // Instantiate the DocumentModel class
        $documentModel = new DocumentModel();

        // Extract the document ID from the POST data
        $documentId = $_POST['Supprimer'];

        // Call the deleteDocument method to delete the document
        $result = $documentModel->deleteDocument($documentId);

        // Check if the deletion was successful
        if ($result) {
            $something_to_say = "Document with ID $documentId deleted successfully.";
            require_once(__DIR__."/controleurmesbruts.php");
        } else {
            echo "Error: Failed to delete document with ID $documentId.";
        }
    } else {
        echo "Error: Document ID is missing or empty.";
    }
} else {
    // Redirect to an error page or handle the situation accordingly
    echo "Error: Form not submitted or invalid request.";
}

?>