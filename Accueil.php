<!DOCTYPE html>
<html>
<head>
	<title>Garage Lartigue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<style>
		main{
			width:100%;
		}
        .box {
            border: 1px solid #ccc;
            padding: 10px;
			
			position:relative;
            flex-direction: row; /* Ajout de cette propriété pour aligner les articles les uns en dessous des autres */
			align-items: center;
			margin-top: 5%;
			z-index: 1;;
			margin-bottom:5%;
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

	<main>
		<div class="box">
		<!-- contenu page -->
		<p>Bienvenue chez TechniAgri ! Nous sommes un garage agricole situé à Saint-Amant, près de Eauze, dans le Gers. Notre équipe dynamique, composée de cinq personnes passionnées par l'agriculture, est spécialisée dans la vente, la réparation et les prestations de service sur les engins et outils agricoles des agriculteurs locaux.</p>

		<p>En tant que concessionnaire de la marque New Holland, nous proposons une large gamme de matériels agricoles de qualité pour répondre aux besoins variés de nos clients. Que vous soyez agriculteur professionnel ou exploitant agricole, nous avons les solutions adaptées à vos besoins pour optimiser vos activités agricoles.</p>

		<p>Notre atelier de réparation est équipé de technologies modernes et notre équipe de techniciens qualifiés est formée pour diagnostiquer, réparer et entretenir vos équipements agricoles. Nous comprenons que la disponibilité de vos équipements est cruciale pour votre activité agricole, c'est pourquoi nous nous efforçons de vous fournir un service rapide et efficace pour minimiser les temps d'arrêt.</p>

		<p>Chez TechniAgri, nous sommes fiers de notre engagement envers la satisfaction de nos clients. Nous vous offrons un service personnalisé et un support technique de qualité pour vous aider à choisir les meilleurs équipements agricoles en fonction de vos besoins spécifiques. Nous nous engageons à vous fournir des solutions durables et fiables pour vous aider à réussir dans vos activités agricoles.</p>

		<p>N'hésitez pas à nous rendre visite dans notre garage à Saint-Amant ou à nous contacter pour en savoir plus sur nos services, nos produits et nos offres promotionnelles. Nous serons ravis de vous aider et de devenir votre partenaire de confiance pour vos besoins en matière d'équipements agricoles dans le Gers.</p>
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
