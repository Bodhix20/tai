<?php
// Perform any necessary includes first
require_once(__DIR__."/model/php/ProfileModel.php");
session_start();

$display_brut = false ;

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
            $display_brut = true ;
        } else {
            // Display an error message if insertion fails
            echo "Error: Failed to create profile.";
        }
    } else {
        // Some required fields are missing
        echo "Error: Please fill in all required fields.";
    }
}

require_once(__DIR__.("/view/php/createBrut.php"))
?>
