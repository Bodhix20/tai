<?php
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // here, the file is in the same folder as the includes.php file (view/)
    include_once __DIR__ . '/includes.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/tai/tai_app_2023_2024_caterpillar/project/view/css/example.css">
        <title>Register test</title>
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

        <form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/registerController.php" class="loginFormContainer">
            <fieldset>
                <legend>Register</legend>                
                <input type="text" placeholder="firstname" id="firstname" name="firstname">
                <input type="text" placeholder="lastname" id="lastname" name="lastname">
                <input type="text" placeholder="login" id="login" name="login">
                <input type="password" placeholder='password' id='pwd' name="pwd">
                <select name=roles>
                    <option type="int" value="0" name="0">Administrator</option>
                    <option type="int" value="1" name="1">User</option>
                    <option type="int" value="2" name="2">Controler</option>
                </select>
                <button type="submit">Submit</button>
            </fieldset>
        </form>

        <?php include_footer(); ?>

    </body>
</html>