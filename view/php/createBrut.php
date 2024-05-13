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
        <link rel="stylesheet" href="/view/css/example.css">
        <title>Welcome</title>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header(); ?>


        <main>

        <div id="profileSelectionContainer">

            <label class="profileLabels" id="circularLabel"><img src="/figs/Profiles/Profile_Circulaire.PNG" width="200">Profile circulaire</label>
            <label class="profileLabels" id="circularHollowLabel"><img src="/figs/Profiles/Profile_Circulaire_Creux.PNG" width="200">Profile circulaire creux</label>
            <label class="profileLabels" id="rectangularProfile"><img src="/figs/Profiles/Profile_Rectangulaire.PNG" width="200">Profile rectangulaire</label>
            <label class="profileLabels" id="rectangulaireHollowLabel"><img src="/figs/Profiles/Profile_Rectangulaire_Creux.PNG" width="200">Profile rectangulaire creux</label>
            <label class="profileLabels" id="iProfileLabel"><img src="/figs/Profiles/Profile_I.PNG" width="200">Profile en I</label>
            <label class="profileLabels" id="tProfileLabel"><img src="/figs/Profiles/Profile_T.PNG" width="200">Profile en T</label>
            <label class="profileLabels" id="uProfileLabel"><img src="/figs/Profiles/Profile_U.PNG" width="200">Profile en U</label>
            
        </div>


        </main>
        
    </body>

</html>