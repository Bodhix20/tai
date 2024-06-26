<?php

/**
 * Our model classes (UserModel in this example) extends the base class DBModel
 * so that we can factorize every common methods into the super class
 * 
 * Every other model classes (to deal with other data and tables) will follow the same principle
 * 
 * @author: w.delamare
 * @date: Dec. 2023
 */

 require_once (__DIR__."/DBModel.php");

class UserModel extends DBModel {


    /**
     * @return an associative array of all employees with first_name, last_name, id, creation_date (not formatted)
     */
    function check_login(string $login, string $password) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM user WHERE login=:login AND password=MD5(:password)";
        $statement = $this->db->prepare($request);
        $statement->execute([
            "login" => $login,
            "password" => $password
        ]);
        $entries = $statement->fetchAll();
        if (count($entries) == 1) {
            $result["firstname"] = $entries[0]['firstname'];
            $result["lastname"] = $entries[0]['lastname'];
            $result["id"] = $entries[0]['id'];
            $result["role"] = $entries[0]['role'];
        }
        return $result;
    }


    /**
     * Inserts a new user into the database
     */
    function create_user(string $firstname, string $lastname, string $login, string $password, int $role) {
        $result = [];
    
        if (!$this->connected) {
            // Connection to the database failed. Handle this according to your application's logic.
            // For this example, we'll return an empty result array.
            return $result;
        }
    
        // Hash the password before storing it in the database (for security reasons)
        $hashed_password = md5($password);
    
        // Prepare the SQL statement to insert a new user into the database
        $request = "INSERT INTO user (firstname, lastname, login, password, role) VALUES (:firstname, :lastname, :login, :password, :role)";
        $statement = $this->db->prepare($request);
    
        // Execute the SQL statement, binding parameters to prevent SQL injection
        $success = $statement->execute([
            "firstname" => $firstname,
            "lastname" => $lastname,
            "login" => $login,
            "password" => $hashed_password,
            "role" => $role
        ]);
    
        // Check if the user was successfully inserted
        if ($success) {
            // User created successfully
            $result["success"] = true;
        } else {
            // Failed to create user
            // You can handle errors based on your application's logic
            // For this example, we'll return an error message
            $result["error"] = "Failed to create user. Please try again.";
        }
    
        return $result;
    }

    /**
     * Checks if a certain login already exists in the db 
     */
    function check_login_exists($login) {
        // Prepare the SQL statement to check if the login already exists in the database
        $request = "SELECT COUNT(*) AS count FROM user WHERE login = :login";
        $statement = $this->db->prepare($request);
        $statement->execute(["login" => $login]);

        // Fetch the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if any rows were returned
        if ($result['count'] > 0) {
            // Login already exists
            return true;
        } else {
            // Login doesn't exist
            return false;
        }
    }

    // other useful methods to interact with the database
    // could be to add a new user, to delete a user, to update a user, etc.
    // all these methods will be called by the controller
    // and will be used to display the correct view
    // (e.g., if the user is added, the controller will call the view to display the welcome page)
    // (e.g., if the user is not added, the controller will call the view to display the login form with an error message)
    
}

