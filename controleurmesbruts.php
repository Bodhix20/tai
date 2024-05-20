<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/view/css/example.css">
        <title>Welcome</title>
    </head>
<html>
<?php
require_once(__DIR__.'/view/php/includes.php');
    include_header(); 
    
    // if an error happened
    if (isset($something_to_say)) {
        include_error_message($something_to_say);
    }
?>
<?php
// Inclure le modèle DBModelmesbruts
require_once (__DIR__.'/model/php/DBModelmesbruts.php');

// Instancier le modèle DBModelmesbruts
$dbModel = new DocumentModel();

// Vérifier si l'utilisateur est connecté (vous pouvez utiliser votre propre logique de gestion de session ici)
session_start();
if (!isset($_SESSION['id'])) {
    // Rediriger vers une page de connexion
    header("Location: login.php");
    exit();
}

// Récupérer l'ID de l'utilisateur à partir de la session active
$id_createur = $_SESSION['id'];

// Récupérer les documents correspondant à l'ID du créateur de session
$infos_document = $dbModel->getDocumentsByCreatorId($id_createur);

// Afficher les informations de la table 'document'
if ($infos_document) {
    echo "<h3>Mes bruts</h3>";
    echo "<ul>";
    foreach ($infos_document as $info) {
        echo "<li>";
        echo "ID: " . $info['id'] . ", ID créateur: " . $info['id_createur'] . ", ID validateur: " . $info['id_validateur'] . ", Profil: " . $info['profile'] . ", Longueur: " . $info['longueur'] . ", Matériau: " . $info['materiau'] . ", État: " . $info['etat'];
        if($_SESSION['role'] == 0){
           ?>
           <form method="post" action="deleteBrut.php">
                <button name="Supprimer" value="<?php echo $info['id']; ?>">Supprimer</button>
            </form>
            <form method="post" action="/view/php/modifyBrut.php">
                <button name="Modifier" value="<?php echo $info['id']; ?>" >Modifier</button>
            </form>
            <form method="post" action="validateBrut.php">
                <button name="Valider" value="<?php echo $info['id']; ?>">Valider</button>
            </form>
           <?php
        }
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Aucune information trouvée dans la table 'document'.</p>";
}
?>


