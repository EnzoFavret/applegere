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
			
			z-index: 1;;
			
        }
		main{
			margin-top: 10%;
			position:relative;
			flex-direction: column; 
    		align-items: center;
			margin-bottom:8%;
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
			bottom:0%;
			position: absolute;
			top: 0;
  left: 0; /* Vous pouvez ajuster la position horizontale si nécessaire */
  width: 100%;
			
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
						<li><a href="#h">Histoire de l'entreprise</a></li>
						<li><a href="#l">L'équipe</a></li>
						<li><a href="#l">Valeurs et engagements</a></li>
					</ul>
				</li>
				<li><a href="Actualités.php">Actualités</a></li>
				<li><a href="Contact.php">Contact</a></li>
			</ul>
		</nav>
	</header>

	<main>
	<div class="box">
			<h1 id="h">Histoire de l'entreprise</h1>
			<p>Fondée il y a plus de 15 ans, TechniAgri est devenue une entreprise de référence dans le domaine de la réparation et de l'entretien d'équipements agricoles dans la région de Saint-Amant près de Eauze, dans le Gers. Au fil des années, TechniAgri s'est développée pour devenir un garage agricole de confiance, offrant un service de qualité à ses clients agriculteurs.</p>
		</div>
		<div class="box">
			<h1 id="l">L'équipe</h1>
			<p>Composée d'une équipe de 5 personnes, TechniAgri compte sur des techniciens agricoles qualifiés et expérimentés qui mettent leur expertise au service des clients. Passionnés par leur métier, les membres de l'équipe de TechniAgri sont constamment formés aux dernières avancées technologiques dans le domaine agricole pour garantir un service de réparation et d'entretien de haute qualité.</p>
		</div>
		<div id="v"class="box">
			<h1>Valeurs et engagements de l'entreprise</h1>
			<p>Chez TechniAgri, l'engagement envers les clients est primordial. L'entreprise met un point d'honneur à offrir un service professionnel, fiable et rapide pour répondre aux besoins spécifiques des agriculteurs. La satisfaction du client est au cœur des préoccupations de TechniAgri, et l'entreprise travaille dur pour établir des relations de confiance à long terme avec ses clients.

En outre, TechniAgri accorde une grande importance à la qualité des pièces de rechange utilisées lors des réparations. L'entreprise propose des pièces d'origine New Holland ou des pièces de qualité équivalente pour garantir la fiabilité et la durabilité des équipements agricoles réparés.

Par ailleurs, TechniAgri s'engage à respecter les normes environnementales et à promouvoir des pratiques agricoles durables. L'entreprise encourage l'utilisation de pièces de rechange recyclables et la réduction de l'empreinte carbone dans ses activités.

Enfin, TechniAgri est également impliquée dans la communauté locale, en soutenant des initiatives agricoles et en contribuant au développement économique de la région.

En choisissant TechniAgri pour leurs besoins de réparation et d'entretien d'équipements agricoles, les agriculteurs peuvent compter sur une équipe compétente, un service de qualité et un engagement envers la satisfaction du client, tout en respectant les normes environnementales et en soutenant la communauté locale.</p>
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
