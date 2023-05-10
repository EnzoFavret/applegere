<!DOCTYPE html>
<html>
<head>
<title>Garage Lartigue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<style>
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Utilisation d'une hauteur minimale de 100vh pour s'assurer que la page occupe au moins tout l'écran */
	z-index: 1;
}

.contenu {
    flex: 1; /* Utilisation de flex pour que le contenu s'étende pour remplir l'espace disponible */
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrage horizontal des boîtes */
    justify-content: center; /* Centrage vertical des boîtes */
    padding: 20px; /* Ajout d'un espace de 20px autour du contenu pour éviter qu'il ne soit trop collé au bord de la fenêtre */
}

.box {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 5px;
    max-width: 800px; /* Définition d'une largeur maximale pour les boîtes pour éviter qu'elles ne deviennent trop larges sur les grands écrans */
}

footer {
    padding: 10px;
    text-align: center;
	position:relative;
    width: 100%;
    flex-shrink: 0; /* Empêcher le footer de rétrécir lorsqu'il y a peu de contenu */
	bottom:0;
}
img{
	max-width: 100%;
  height: auto;
}
header{
			z-index: 2;
		}
		nav{
			z-index: 2;
		}
		ul{
			z-index: 2;
		}
		li{
			z-index: 2;
		}


    </style>
</head>
<body>
<header>
		<nav>
			<ul>
				<li><a href="Accueil.php">Accueil</a>
				</li>
				<li><a href="Nos Services.php">Nos Services</a>
					<ul>
					<li><a href="Nos Services.php#r">Réparation et entretien</a></li>
						<li><a href="Nos Services.php#v">Vente de pièces</a></li>
						<li><a href="Nos Services.php#c">Dépannage et conseil</a></li>
					</ul>
				</li>
				<li><a href="A propos de nous.php">A propos de nous</a>
					<ul>
					<li><a href="A propos de nous.php#h">Histoire de l'entreprise</a></li>
						<li><a href="A propos de nous.php#l">L'équipe</a></li>
						<li><a href="A propos de nous.php#l">Valeurs et engagements</a></li>
					</ul>
				</li>
				<li><a href="Actualités.php">Actualités</a></li>
				<li><a href="Contact.php">Contact</a></li>
			</ul>
		</nav>
	</header>

	<div class="contenu">
		<!-- contenu page -->
    <?php
    require('waytobdd.php'); // Inclusion du fichier de connexion à la base de données

    // Requête SQL pour récupérer les articles de la base de données
    $sql = "SELECT Titre, Contenu, Image, Date FROM Articles";
    $stmt = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<div class=\"box\">";
        echo "<h3>" . $row['Titre'] . "</h3>";
        echo "<p>" . $row['Contenu'] . "</p>";
        if (!empty($row['Image'])) {
            echo "<img src=\"data:image/jpg;base64," . base64_encode($row['Image']) . "\">";
        }
        echo "<p class=\"date\">Date d'écriture : " . $row['Date']->format('Y-m-d') . "</p>";
        echo "</div>";
		echo "<br>";
    }
    ?>
	</div>

	<footer>
		<ul>
			<li><a href="Actualités.php">Actualités</a></li>
			<li><a href="Contact.php">Contact</a></li>
			<li><a href="ml.html">Mentions légales</a></li>
		</ul>
	</footer>
</body>
</html>
