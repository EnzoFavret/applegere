<!DOCTYPE html>
<html>
<head>
<title>Garage Lartigue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<style>
        .box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
			position:relative;
            flex-direction: row; /* Ajout de cette propriété pour aligner les articles les uns en dessous des autres */
			align-items: center;
        }

        .box img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .box h3 {
            margin: 0;
        }

        .box p {
            margin: 0;
        }

        .box .date {
            color: #999;
        }
		main{
			position:static;
			flex-direction: row; /* Affiche les éléments en ligne */
    		align-items: center;
		}
    </style>
</head>
<body>
<header>
		<nav>
			<ul>
				<li><a href="Accueil.php">Accueil</a>
					<ul>
						<li><a href="#">Présentation du garage</a></li>
						<li><a href="#">Marques et équipements</a></li>
						<li><a href="#">Photos</a></li>
					</ul>
				</li>
				<li><a href="Nos Services.php">Nos Services</a>
					<ul>
						<li><a href="#">Réparation et entretien</a></li>
						<li><a href="#">Vente de pièces</a></li>
						<li><a href="#">Dépannage et conseil</a></li>
					</ul>
				</li>
				<li><a href="A propos de nous.php">A propos de nous</a>
					<ul>
						<li><a href="#">Histoire de l'entreprise</a></li>
						<li><a href="#">L'équipe</a></li>
						<li><a href="#">Valeurs et engagements</a></li>
					</ul>
				</li>
				<li><a href="Actualités.php">Actualités</a></li>
				<li><a href="Contact.php">Contact</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<!-- contenu page -->
    <h1>Articles</h1>

    <?php
    require('waytobdd.php'); // Inclusion du fichier de connexion à la base de données

    // Requête SQL pour récupérer les articles de la base de données
    $sql = "SELECT * FROM Articles ORDER BY Date DESC";
$stmt = sqlsrv_query($conn, $sql);

if($stmt === false){
    die( print_r( sqlsrv_errors(), true));
}

$articles = array();
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $articles[] = $row;
}
    ?>
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
	</main>

	<footer>
		<ul>
			<li><a href="Actualités.php">Actualités</a></li>
			<li><a href="Contact.php">Contact</a></li>
			<li><a href="ml.html">Mentions légales</a></li>
		</ul>
	</footer>
</body>
</html>
