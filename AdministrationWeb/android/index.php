<?php
	// on charge la classe de gestion de la BDD
	require_once ('../classe/clstBdd.class.php');

	// on lance la session qui contiendra la connexion ainsi que le login
	
	session_start();

	// On charge la connexion à la BDD
	require_once ('../inc/connexion.inc.php');
	
	// Création de la variable page
	$page = @$_GET["page"] ;
	
	// Création de la variable date qui prend la date du jour
	$date = date("Y-m-d");
	
	// Création de la variable heure qui prend l'heure actuelle
	$heure = date("H:i:s");
 
	// On charge le fichier head.php
	require("mdl/head.php") ; 
	
	// On charge la page header.php
	//require("mdl/header.php"); 
?>
	

	
	<!-- Contenu de la page -->
	<article>
		<section id="content">
			<div class="padding">
				
			
				<!-- Gestion des pages -->
<?php
				// si la variable page est vide
				if(empty($_GET['page']))
				{
					// on definit la variable page à null
					$page = null ;
				}
				else
				{
					$page = $_GET['page'] ;
				}
				switch ($page)
				{
					// Vues
					case "consulterArtistes" :
						include("FO/vues/artistes/FO_consulterArtistes.php");
						break;
					case "consulterEvenements" :
						include("FO/vues/evenements/FO_consulterEvenements.php");
						break;
					case "lireArt" :
						include("FO/vues/artistes/FO_consulterUnArtiste.php");
						break;
					case "lireEve" :
						include("FO/vues/evenements/FO_consulterUnEvenement.php");
						break;
					case "consulterInfos" :
						include("FO/vues/infos/FO_consulterInfos.php");
						break;
					case "ajouterMessage" :
						include("FO/vues/messages/FO_ajouterMessage.php");
						break;
					case "envoyerMail" :
						include("FO/vues/mail/FO_envoyerMail.php");
						break;
					// Modeles 
					case "lireStream" :
						include("FO/modeles/stream/lireStream.inc.php");
						break ;
						
					case "ajoutMessage" :
						include("FO/modeles/messages/ajouterMessage.inc.php");
						break ;
						
					case "envoiMail" :
						include("FO/modeles/mail/envoyerMail.inc.php");
						break ;
					// Inc
					
					
						
					// On définie la page par défaut	
					default :
						include("FO/vues/FO_accueil.php") ;
				}
?>
			</div>
		</section>

	</article>
	<!-- Pied de page -->
	<?php //require("mdl/footer.php") ; ?>
		
	</body>
</html>