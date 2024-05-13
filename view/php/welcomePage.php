<!-- 
    Example HTML file to showcase a simple login form which uses
        - a php controller script (logic-related aspects) that calls a php model script (data-related aspects)
        - a php view script (UI-related aspects)

* @author: w.delamare
* @date: Dec. 2023
 -->

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

        <script>
            window.onload = function(){

                //javascript event listener to open the corresponding pages uppon button click
                document.getElementById("creerBrut").addEventListener("click",function(){
                    window.open('/view/php/createBrut.php','_self')
                })

                //javascript event listener to open the corresponding pages uppon button click
                document.getElementById("mesBruts").addEventListener("click",function(){
                    window.open('/view/php/mybrut.php','_self')
                })
            }
        </script>

    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header(); ?>


        <main>
            <h3>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ." " .$_SESSION['role']."!!"; ?></h3>
            
            <div id="brutsOptionContainer">
                <div id="creationBrut">
                    <?php
                    if($_SESSION['role']==0 || $_SESSION['role']==1){
                        ?>            
                        <button id="creerBrut">Créer un brut</button>
                        <?php
                    }else{
                        ?>
                        <button id="validerBruts">Valider des bruts</button>
                        <?php
                    }
                    ?>
                </div>
                <div id="brutsExistants">
                    <?php
                    if($_SESSION['role']==0 || $_SESSION['role']==1) {
                        ?>
                        <button id="mesBruts">Mes bruts</button>
                        <?php
                    }
                    ?>
                </div>
            </div>

            
        </main>


        <?php include_footer(); ?>

    </body>
</html>