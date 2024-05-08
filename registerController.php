<?php
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    require_once(__DIR__."/model/php/UserModel.php");

    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['login']) && isset($_POST['pwd']) && isset($_POST['roles'])){

        if(strlen($_POST['firstname'])>0 && strlen($_POST['lastname'])>0 && strlen($_POST['login'])>0 && strlen($_POST['pwd'])>0 && strlen($_POST['roles'])>0){

            $userModel = new UserModel();

            if($userModel->check_login_exists($_POST['login'])) {
                // If the login already exists, display an error message or handle it accordingly
                $something_to_say = "Login already exists. Please choose a different login.";

                require_once(__DIR__."/view/php/register.php");
                
            }else{
                $result = $userModel->create_user($_POST['firstname'],$_POST['lastname'],$_POST['login'],$_POST['pwd'],$_POST['roles']);
                $something_to_say = "Succesfully created a new account";                              

                if ($result['success']==true) {
                    require_once(__DIR__."/view/php/loginExample.php");
                }else{
                    require_once(__DIR__."/view/php/register.php");
                }
            }  
            



            
        }
    }

    
    



