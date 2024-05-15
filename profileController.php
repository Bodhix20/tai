<?php
// Perform any necessary includes first
require_once(__DIR__."/model/php/ProfileModel.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['longueur'], $_POST['materiau'], $_POST['profile'])) {
        // Create an instance of the ProfileModel
        $profileModel = new ProfileModel();

        // Insert profile data into the database
        $result = $profileModel->createProfile(
            $_SESSION['id'], // Assuming you have a session variable for the creator ID
            0, // Assuming you have a session variable for the validator ID
            $_POST['profile'], 
            $_POST['longueur'], 
            $_POST['materiau'], 
            0
        );

        if($result) {
            // Redirect to a confirmation page or display a success message
            header("Location: /view/php/welcomePage.php");
            exit;
        } else {
            // Display an error message if insertion fails
            echo "Error: Failed to create profile.";
        }
    } else {
        // Some required fields are missing
        echo "Error: Please fill in all required fields.";
    }
}
?>
