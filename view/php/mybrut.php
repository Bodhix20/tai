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
    <link rel="stylesheet" href="/tai/tai_app_2023_2024_caterpillar/project/view/css/example.css">
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
    <a href="/tai/tai_app_2023_2024_caterpillar/project/welcomePage.php" class="button">Retour à l'accueil</a>
 </nav>
 
    <h2>Filtre de recherche</h2>
    <form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/view/php/controleurmesbruts.php">
        <label for="profil">profil:</label>
        <select name="profil" id="profil">
            <option value="">-- Sélectionnez --</option>
            <option value="0">circulaire</option>
            <option value="1">circulaire creux</option>
            <option value="2">rectangulaire</option>
            <option value="3">rectangulaire creux</option>
            <option value="4">profil I</option>
            <option value="5">profil T</option>
            <option value="6">profil U </option>
        </select>
        
        <label for="longueur">Longueur:</label>
        <input type="text" name="longueur" placeholder="Longueur">
        
        <label for="materiaux">Matériau:</label>
        <select name="materiaux" id="materiaux">
            <option value="">-- Sélectionnez --</option>
            <option value="0">acier</option>
            <option value="1">acier inoxydable</option>
            <option value="2">aluminium</option>
        </select>

        <label for="etat">etat:</label>
        <select name="etat" id="etat">
            <option value="">-- Sélectionnez --</option>
            <option value="0">en cours</option>
            <option value="1">validé</option>
            <option value="2">refusé</option>
        </select>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
        
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>



