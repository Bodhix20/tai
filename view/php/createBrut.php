<?php
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // here, the file is in the same folder as the includes.php file (view/)
    include_once __DIR__ . '/includes.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/view/css/example.css">
        <title>Welcome</title>

        <script src='/Scripts/main.js' type="module"></script>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header(); ?>


        <main>

        <h3>Sélectionnez un type de profile</h3>

        <div id="profileSelectionContainer">        

            <label class="profileLabels"><img src="/figs/Profiles/Profile_Circulaire.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="0"> Profile circulaire</label>
            <label class="profileLabels"><img src="/figs/Profiles/Profile_Circulaire_Creux.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="1"> Profile circulaire creux</label>
            <label class="profileLabels"><img src="/figs/Profiles/Profile_Rectangulaire.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="2"> Profile rectangulaire</label>
            <label class="profileLabels"><img src="/figs/Profiles/Profile_Rectangulaire_Creux.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="3"> Profile rectangulaire creux</label>
            <label class="profileLabels"><img src="/figs/Profiles/Profile_I.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="4"> Profile en I</label>
            <label class="profileLabels"><img src="/figs/Profiles/Profile_T.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="5"> Profile en T</label>
            <label class="profileLabels"><img src="/figs/Profiles/Profile_U.PNG" width="200"><input type="radio" class="profileSelectionRadioBTN" name="profileRadio" id="6"> Profile en U</label>

        </div>

        <div id="materialSelectionContainer">


        </div>



        </main>
        
    </body>

</html>