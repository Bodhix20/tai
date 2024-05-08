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
        <link rel="stylesheet" href="view/css/example.css">
        <title>Welcome</title>
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
                        include_createBrut();
                    }
                    ?>
                </div>
                <div id="brutsExistants">
                    <?php include_mesBruts(); ?>
                </div>
            </div>

            
        </main>


        <?php include_footer(); ?>

    </body>
</html>