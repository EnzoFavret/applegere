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
			
			position:relative;
            flex-direction: row; /* Ajout de cette propriété pour aligner les articles les uns en dessous des autres */
			align-items: center;
			margin-top: 5px;
			z-index: 1;
			margin-bottom:5px;
        }
        .box p {
            margin: 0;
        }

        .box .date {
            color: #999;
        }
		main{
			position:static;
			flex-direction: column; 
    		align-items: center;
		}
		footer{
			padding: 10px;
    		text-align: center;
    		position: absolute;
    		bottom: auto;
    		width: 100%;
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
						<li><a href="#r">Réparation et entretien</a></li>
						<li><a href="#v">Vente de pièces</a></li>
						<li><a href="#c">Dépannage et conseil</a></li>
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

	<main>
		<!-- contenu page -->
		<div class="box">
			<h1>Réparation et entretien</h1>
			<p>L'équipe de TechniAgri est composée de techniciens agricoles expérimentés qui assurent la réparation et l'entretien d'une large gamme d'engins et d'outils agricoles. Que ce soit pour des tracteurs, des moissonneuses-batteuses, des pulvérisateurs, des semoirs ou d'autres équipements agricoles, TechniAgri offre des services de réparation de qualité pour assurer le bon fonctionnement et la durabilité des machines agricoles. Les techniciens effectuent également des opérations d'entretien préventif pour optimiser les performances des équipements et minimiser les temps d'arrêt imprévus.</p>
		</div>
		<div class="box">
			<h1>Vente de pièces</h1>
			<p>TechniAgri propose une large gamme de pièces de rechange pour les équipements agricoles de la marque New Holland. Que ce soit pour des pièces de moteur, de transmission, d'électrique, d'hydraulique, ou d'autres composants, TechniAgri dispose d'un stock de pièces d'origine New Holland ou de pièces de qualité équivalente pour assurer la disponibilité des pièces nécessaires à la réparation et à l'entretien des machines agricoles. Il en va de même pour les autres marques !</p>
		</div>
		<div class="box">
			<h1>Dépannage et conseil</h1>
			<p>TechniAgri offre également des services de dépannage et de conseil aux agriculteurs. En cas de panne ou de problème technique sur un équipement agricole, l'équipe de TechniAgri intervient rapidement pour diagnostiquer et réparer les problèmes. Les techniciens sont également disponibles pour fournir des conseils techniques et des recommandations pour optimiser l'utilisation des équipements agricoles et améliorer leur efficacité.</p>
		</div>
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
