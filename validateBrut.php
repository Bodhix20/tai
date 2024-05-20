<?php
// Include the DocumentModel class
require_once(__DIR__.'/model/php/DBModelmesbruts.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Valider'])) {
    // Check if the document ID and new state are set and not empty
    
        // Instantiate the DocumentModel class
        $documentModel = new DocumentModel();

        // Extract the document ID and new state from the POST data
        $documentId = $_POST['Valider'];
        $newState = 1;

        // Call the updateDocumentState method to update the document state
        $result = $documentModel->updateDocumentState($documentId, $newState);

        // Check if the update was successful
        if ($result) {
            $something_to_say = "Document with ID $documentId updated to state $newState successfully.";
            require_once(__DIR__ . '/controleurmesbruts.php');
        } else {
            echo "Error: Failed to update document with ID $documentId.";
        }
    } else {
        echo "Error: Document ID or new state is missing or empty.";
    }
?>