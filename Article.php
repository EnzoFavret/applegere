<?php
require_once("waytobdd.php");

// Ajouter un article
if(isset($_POST['ajouter'])){
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];

    // Vérifier si une image a été téléchargée
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = file_get_contents($_FILES['image']['tmp_name']);
    }
    else{
        $image = null;
    }

    // Insérer l'article dans la base de données
    $sql = "INSERT INTO Article (Titre, Contenu, image, Date) VALUES (?, ?, ?, ?)";
    $params = array($titre, $contenu, $image, $date);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if($stmt === false){
        die( print_r( sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit();
}

// Modifier un article
if(isset($_POST['modifier'])){
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];

    // Vérifier si une image a été téléchargée
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $sql = "UPDATE Article SET Titre=?, Contenu=?, image=?, Date=? WHERE id=?";
        $params = array($titre, $contenu, $image, $date, $id);
    }
    else{
        $sql = "UPDATE Article SET Titre=?, Contenu=?, Date=? WHERE id=?";
        $params = array($titre, $contenu, $date, $id);
    }

    // Mettre à jour l'article dans la base de données
    $stmt = sqlsrv_query($conn, $sql, $params);

    if($stmt === false){
        die( print_r( sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit();
}

// Supprimer un article
if(isset($_POST['supprimer'])){
    $id = $_POST['id'];

    // Supprimer l'article de la base de données
    $sql = "DELETE FROM Article WHERE id=?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if($stmt === false){
        die( print_r( sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit();
}

// Récupérer tous les articles
$sql = "SELECT * FROM Article ORDER BY Date DESC";
$stmt = sqlsrv_query($conn, $sql);

if($stmt === false){
    die( print_r( sqlsrv_errors(), true));
}

$articles = array();
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $articles[] = $row;
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des articles</title>
</head>
<body>
    <h1>Gestion des articles</h1>

    <!-- Formulaire pour ajouter un article -->
    <h3>Ajouter un article</h3>
    <form method="post" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" required><br><br>
        <label for="contenu">Contenu :</label>
        <textarea name="contenu" required></textarea><br><br>
        <label for="image">Image :</label>
        <input type="file" name="image"><br><br>
        <label for="date">Date :</label>
        <input type="date" name="date" required><br><br>
        <input type="submit" name="ajouter" value="Ajouter">
    </form>

    <!-- Tableau des articles -->
    <h2>Liste des articles</h2>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articles as $article): ?>
                <tr>
                    <td><?= $article['Titre'] ?></td>
                    <td><?= $article['Contenu'] ?></td>
                    <td>
                        <?php if($article['image'] !== null): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($article['image']) ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?= $article['Date']->format('Y-m-d') ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <input type="submit" name="modifier" value="Modifier">
                            <input type="submit" name="supprimer" value="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulaire pour modifier un article -->
    <h3>Modifier un article</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] : '' ?>">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" value="<?= isset($_POST['titre']) ? $_POST['titre'] : '' ?>" required><br><br>
        <label for="contenu">Contenu :</label>
        <textarea name="contenu" required><?= isset($_POST['contenu']) ? $_POST['contenu'] : '' ?></textarea><br><br>
        <label for="image">Image :</label>
        <input type="file" name="image"><br><br>
        <label for="date">Date :</label>
        <input type="date" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>" required><br><br>
        <input type="submit" name="modifier" value="Modifier">
    </form>
</body>
</html>
