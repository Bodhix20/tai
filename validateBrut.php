<?php
// Include the DocumentModel class
require_once(__DIR__.'/model/php/DBModelmesbruts.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Validate'])) {
    // Check if the document ID and new state are set and not empty
    if (isset($_POST['documentId']) && !empty($_POST['documentId']) && isset($_POST['newState'])) {
        // Instantiate the DocumentModel class
        $documentModel = new DocumentModel();

        // Extract the document ID and new state from the POST data
        $documentId = $_POST['documentId'];
        $newState = $_POST['newState'];

        // Call the updateDocumentState method to update the document state
        $result = $documentModel->updateDocumentState($documentId, $newState);

        // Check if the update was successful
        if ($result) {
            $something_to_say = "Document with ID $documentId updated to state $newState successfully.";
            require_once(__DIR__ . '/controlleurmesbruts.php');
        } else {
            echo "Error: Failed to update document with ID $documentId.";
        }
    } else {
        echo "Error: Document ID or new state is missing or empty.";
    }
} else {
    // Redirect to an error page or handle the situation accordingly
    echo "Error: Form not submitted or invalid request.";
}
?>