<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tai/tai_app_2023_2024_caterpillar/project/view/css/example.css">
    <title>Welcome</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .actions button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<?php
require_once(__DIR__.'/view/php/includes.php');
include_header(); 

// if an error happened
if (isset($something_to_say)) {
    include_error_message($something_to_say);
}

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
    echo "<table>";
    echo "<thead>";
    echo "<tr>
            <th>ID</th>
            <th>ID créateur</th>
            <th>ID validateur</th>
            <th>Profil</th>
            <th>Longueur</th>
            <th>Matériau</th>
            <th>État</th>
            <th>Actions</th>
          </tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($infos_document as $info) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($info['id']) . "</td>";
        echo "<td>" . htmlspecialchars($info['id_createur']) . "</td>";
        echo "<td>" . htmlspecialchars($info['id_validateur']) . "</td>";
        echo "<td>" . htmlspecialchars($info['profile']) . "</td>";
        echo "<td>" . htmlspecialchars($info['longueur']) . "</td>";
        echo "<td>" . htmlspecialchars($info['materiau']) . "</td>";
        echo "<td>" . htmlspecialchars($info['etat']) . "</td>";
        echo "<td class='actions'>";
        if ($_SESSION['role'] == 0) {
            echo '<form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/deleteBrut.php" style="display:inline-block;">
                    <button name="Supprimer" value="' . htmlspecialchars($info['id']) . '">Supprimer</button>
                  </form>';
            echo '<form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/view/php/modifyBrut.php" style="display:inline-block;">
                    <button name="Modifier" value="' . htmlspecialchars($info['id']) . '">Modifier</button>
                  </form>';
            echo '<form method="post" action="/tai/tai_app_2023_2024_caterpillar/project/validateBrut.php" style="display:inline-block;">
                    <button name="Valider" value="<?php echo $info['id']; ?>">Valider</button>
                  </form>';
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Aucune information trouvée dans la table 'document'.</p>";
}
?>
</body>
</html>
