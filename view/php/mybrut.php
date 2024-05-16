<?php
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // here, the file is in the same folder as the includes.php file (view/)
    include_once __DIR__ . '/includes.php';
    session_start();
?>


</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/example.css">
    <title>Welcome</title>
    <style>
        /* CSS pour afficher les filtres sur la même ligne */
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        label {
            flex: 1 0 150px; /* Ajustez la largeur des étiquettes selon vos besoins */
            margin-right: 5px;
            margin-bottom: 5px;
        }

        select,
        input[type="date"],
        input[type="submit"] {
            flex: 2 0 auto;
            width: auto;
        }
    </style>
</head>
<body>
        <!-- PHP only used to display stuff -->
        <?php include_header();?>

        <!-- Ajout du bouton de retour à l'accueil -->
<nav>
    <a href="welcomePage.php" class="button">Retour à l'accueil</a>
 </nav>
 
    <h2>Filtre de recherche</h2>
    <form method="post" action="resultats.php">
        <label for="profil">profil:</label>
        <select name="profil" id="profil">
            <option value="">-- Sélectionnez --</option>
            <option value="circulaire creux">circulaire creux</option>
            <option value="circulaire">circulaire</option>
            <option value="profil I">profil I</option>
            <option value="rectangulaire creux">rectangulaire creux</option>
            <option value="rectangulaire">rectangulaire</option>
            <option value="profil T">profil T</option>
            <option value="profile U">profil U </option>
        </select>
        
        <label for="longueur">Longueur:</label>
        <select name="longueur" id="longueur">
            <option value="">-- Sélectionnez --</option>
            <option value="longueur1">Longueur 1</option>
            <option value="longueur2">Longueur 2</option>
        </select>
        
        <label for="materiaux">Matériau:</label>
        <select name="materiaux" id="materiaux">
            <option value="">-- Sélectionnez --</option>
            <option value="acier">acier</option>
            <option value="acier inoxydable">acier inoxydable</option>
            <option value="aluminium">aluminium</option>
        </select>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
        
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>
        


