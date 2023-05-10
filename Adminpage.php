<?php
require('waytobdd.php'); // Inclusion du fichier de connexion à la base de données
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
// Ajouter un nouvel article
if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $image_data = null;
    // Vérifier si une image a été ajoutée
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Ouvrir le fichier image et le lire sous forme de données binaires
    $image_data = file_get_contents($_FILES['image']['tmp_name']);
    }
    $date = $_POST['date'];

// Requête SQL pour insérer un nouvel article dans la base de données
$sql = "INSERT INTO Articles (Titre, Contenu, Image, Date) VALUES (?, ?, CONVERT(varbinary(max), ?), ?)";
$params = array($titre, $contenu, $image_data, $date);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    //echo "Erreur lors de l'ajout de l'article.<br />";
    die( print_r( sqlsrv_errors(), true));
} else {
    //echo "L'article a été ajouté avec succès.<br />";
}
}
// Supprimer un article
if (isset($_POST['supprimer'])) {
    $id = $_POST['article_supprimer'];
    
    // Requête SQL pour supprimer un article de la base de données
    $sql = "DELETE FROM Articles WHERE Titre = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        //echo "Erreur lors de la suppression de l'article.<br />";
        die( print_r( sqlsrv_errors(), true));
    } else {
        //echo "L'article a été supprimé avec succès.<br />";
    }
}

// Modifier un article
if (isset($_POST['modifier'])) {
    $id = $_POST['article_modifier'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];
    $image_data = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Ouvrir le fichier image et le lire sous forme de données binaires
        $image_data = file_get_contents($_FILES['image']['tmp_name']);
    }
    // Requête SQL pour modifier un article dans la base de données
        $sql = "UPDATE Articles SET Titre = ?, Contenu = ?, image = CONVERT(varbinary(max), ?), Date = ? WHERE Titre = ?";
        $params = array($titre, $contenu, $image_data, $date, $id);
        $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo "Erreur lors de la modification de l'article.<br />";
        die( print_r( sqlsrv_errors(), true));
    } else {
        //echo "L'article a été modifié avec succès.<br />";
    }
}




?>
<!DOCTYPE html>
<html>
<head>
    <title>Interface d'administration - Gestion des articles</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admincss.css">
</head>
<body>
    <h1>Interface d'administration - Gestion des articles</h1>
    
    <!-- Formulaire pour ajouter un nouvel article -->
    <div class="box">
    <h2>Ajouter un nouvel article</h2>
    <form class="form-inline" method="post" action="" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>
        <label for="contenu">Contenu :</label><br>
        <textarea id="contenu" name="contenu" rows="4" cols="50" required></textarea><br>
        <label for="image">Image :</label>
        <input type="file" id="image" name="image" required><br> <!-- Champ de type 'file' pour télécharger une image -->
        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required><br> <!-- Champ de type 'date' pour choisir une date -->
        <input type="submit" name="ajouter" value="Ajouter">
    </form>
    </div>
    <!-- Formulaire pour supprimer un article -->
    <div class="box">
    <h2>Supprimer un article</h2>
    <form class="form-inline" method="post" action="" enctype="multipart/form-data">
        <label for="article_supprimer">Sélectionnez l'article à supprimer :</label>
        <select id="article_supprimer" name="article_supprimer" required>
            <!-- Affichage des articles existants dans la base de données -->
            <?php
            $sql = "SELECT Titre FROM Articles";
            $stmt = sqlsrv_query($conn, $sql);
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<option value=\"" . $row['Titre'] . "\">" . $row['Titre'] . "</option>";
            }
            ?>
        </select><br>
        <input type="submit" name="supprimer" value="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
    </form>
    </div>
    <!-- Formulaire pour modifier un article -->
    <div class="box">
    <h2>Modifier un article</h2>
    <form class="form-inline" method="post" action="" enctype="multipart/form-data">
        <label for="article_modifier">Sélectionnez l'article à modifier :</label>
        <select id="article_modifier" name="article_modifier" required>
            <!-- Affichage des articles existants dans la base de données -->
            <?php
            $sql = "SELECT Titre FROM Articles";
            $stmt = sqlsrv_query($conn, $sql);
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<option value=\"" . $row['Titre'] . "\">" . $row['Titre'] . "</option>";
            }
            ?>
        </select><br>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>
        <label for="contenu">Contenu :</label><br>
        <textarea id="contenu" name="contenu" rows="4" cols="50" required></textarea><br>
        <label for="image">Image :</label>
        <input type="file" id="image" name="image" required><br>
        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required><br>
        <input type="submit" name="modifier" value="Modifier">
    </form>
    </div>
    <div id="logout" >
    <form class="front-line" action="logout.php">
    <input type="submit" name="deco" value="Se Deconnecter">
        </form>
        </div>
        
</body>
</html>

