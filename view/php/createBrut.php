<?php
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // here, the file is in the same folder as the includes.php file (view/)
    include_once (__DIR__ . '/includes.php');
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/tai/tai_app_2023_2024_caterpillar/project/view/css/example.css">
        <title>Créer un brut</title>

        <script>
            window.onload = function(){

            //first we set the event listener which will set the profile type and show the html div for setting the material of the profile
            const labels = document.querySelectorAll(".profileSelectionRadioBTN")

            for(let i=0 ; i<labels.length ; i++){
                labels[i].addEventListener("click",function(){
                    document.getElementById("lengthAndMaterialSelectionContainer").style.display = "block"            
                })
            }
            }
        </script>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header();?>

        <!-- Ajout du bouton de retour à l'accueil -->
        <nav>
            <a href="/tai/tai_app_2023_2024_caterpillar/project/welcomePage.php" class="button">Retour à l'accueil</a>
        </nav>

        <main>
        
        <?php if(!isset($display_brut)): ?>

        <h3>Sélectionnez un type de profile</h3>

        <form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/profileController.php" id="profileCreationForm">
            <div id="profileSelectionContainer">        
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_Circulaire.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="0"> Profile circulaire</label>
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_Circulaire_Creux.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="1"> Profile circulaire creux</label>
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_Rectangulaire.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="2"> Profile rectangulaire</label>
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_Rectangulaire_Creux.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="3"> Profile rectangulaire creux</label>
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_I.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="4"> Profile en I</label>
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_T.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="5"> Profile en T</label>
                <label class="profileLabels"><img src="/tai/tai_app_2023_2024_caterpillar/project/figs/Profiles/Profile_U.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profile" value="6"> Profile en U</label>
            </div>

            <div id="lengthAndMaterialSelectionContainer" style="display : none ;">
                <h3>Sélectionnez un matériau et une longueur</h3>
                <br>
                
                <div id="createBrutInputContainer">
                    <select name="materiau" id="materialSelectionDropdown">
                        <option value="" selected disabled hidden>Choisir un matériau</option>
                        <option value="0">Acier</option>
                        <option value="1">Acier inoxydable</option>
                        <option value="2">Aluminium</option>                
                    </select>
                    <br>

                    <input type="text" placeholder="Choisissez une longueur" name="longueur" id="lengthInputTextbox">
                    <br>

                    <input type="submit" value="Submit" id="brutFormSubmitButton">
                </div>
            </div>
        </form>

        <?php endif; ?>

        <?php if(isset($display_brut)): ?>
            <h3>Brut créée avec succès</h3>
            <a href="/tai/tai_app_2023_2024_caterpillar/project/controleurmesbruts.php">Voir mes bruts</a>
        <?php endif; ?>   


        </main> 
    </body>

</html>
