<?php
// Connexion à la base de données (à remplacer par vos informations de connexion)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "tai";

try {
    // Création de la connexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration des erreurs PDO pour afficher les exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Construction de la requête SQL en utilisant des paramètres nommés
    $sql = "SELECT * FROM documents WHERE 1";

    // Tableau des paramètres
    $params = array();

    // Ajout des conditions selon les filtres sélectionnés
    if (!empty($_POST['dimension'])) {
        $sql .= " AND dimension = :dimension";
        $params[':dimension'] = $_POST['dimension'];
    }
    if (!empty($_POST['longueur'])) {
        $sql .= " AND longueur = :longueur";
        $params[':longueur'] = $_POST['longueur'];
    }
    if (!empty($_POST['largeur'])) {
        $sql .= " AND largeur = :largeur";
        $params[':largeur'] = $_POST['largeur'];
    }
    if (!empty($_POST['hauteur'])) {
        $sql .= " AND hauteur = :hauteur";
        $params[':hauteur'] = $_POST['hauteur'];
    }
    if (!empty($_POST['materiaux'])) {
        $sql .= " AND materiaux = :materiaux";
        $params[':materiaux'] = $_POST['materiaux'];
    }
    if (!empty($_POST['date'])) {
        $sql .= " AND date = :date";
        $params[':date'] = $_POST['date'];
    }

    // Préparation de la requête
    $statement = $conn->prepare($sql);

    // Exécution de la requête avec les paramètres
    $statement->execute($params);

    // Récupération des résultats
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des résultats
    if (count($result) > 0) {
        echo "<ul>";
        foreach ($result as $row) {
            echo "<li>Nom du document: " . $row["nom"] . ", Dimension: " . $row["dimension"] . ", Longueur: " . $row["longueur"] . ", Largeur: " . $row["largeur"] . ", Hauteur: " . $row["hauteur"] . ", Matériau: " . $row["materiaux"] . ", Date: " . $row["date"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion
$conn = null;
?>
