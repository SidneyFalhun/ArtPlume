<?php
	// on charge la classe de gestion de la BDD
	require_once ('classe/clstBdd.class.php');

	// on lance la session qui contiendra la connexion ainsi que le login
	
	session_start();

	// On charge la connexion à la BDD
	require_once ('inc/connexion.inc.php');
	
	// Création de la variable page
	$page = @$_GET["page"] ;
	
	// Création de la variable date qui prend la date du jour
	$date = date("Y-m-d");
	
	// Création de la variable heure qui prend l'heure actuelle
	$heure = date("H:i:s");
 
	// On charge le fichier head.php
	require("mdl/head.php") ; 
	
	// On charge la page header.php
	require("mdl/header.php"); 
?>
	
		
	
<?php 
		// On Charge le menu
		require("mdl/menu.php") ; 
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
					/*
						
					*/
					case "consulterMessages" :
						include("FO/vues/messages/FO_consulterMessages.php") ;
						break ;
					
					case "consulterEvenements" :
						include("FO/vues/evenements/FO_consulterEvenements.php") ;
						break ;
						
					case "modifierEvent" :
						include("FO/vues/evenements/FO_modifierEvenement.php") ;
						break ;
						
					case "modifierArtiste" :
						include("FO/vues/artistes/FO_modifierArtiste.php") ;
						break ;
					
						
					case "consulterArtistes" :
						include("FO/vues/artistes/FO_consulterArtistes.php") ;
						break ;
					
					case "ajouterEvenements" :
						include("FO/vues/evenements/FO_ajouterEvenements.php") ;
						break ;
						
					case "ajouterArtiste" :
						include("FO/vues/artistes/FO_ajouterArtiste.php") ;
						break ;
					case "accueil" :
						include("FO/vues/FO_accueil.php") ;
						break ;
						
					case "modifierLien" :
						include("FO/vues/stream/FO_modifierLien.php");
						break ;
						
					case "connexion" :
						include("FO/vues/FO_connexion.php");
						break ;
						
					case "deconnexion" :
						include("FO/vues/FO_deconnexion.php");
						break ;
					
					case "404" :
						include("FO/vues/FO_404.php") ;
						break ;
						
					case "ajouterTypEvent" :
						include("FO/vues/typevenements/FO_ajouterTypevenements.php");
						break;
					
					case "lireMess" :
						include("FO/vues/messages/FO_consulterUnMessage.php");
						break;
					
					case "modifierInfos" :
						include("FO/vues/infos/FO_modifierInfos.php");
						break;
						
						
					// Modeles
					
					case "modifEvent" :
						include("FO/modeles/evenements/modifierEvenement.inc.php") ;
						break ;
					
					case "suprMess" :
						include("FO/modeles/messages/supprimerMessages.inc.php") ;
						break ;
						
					case "modifArtiste" :
						include("FO/modeles/artistes/modifierArtiste.inc.php") ;
						break ;
						
					case "ajoutEvent" :
						include("FO/modeles/evenements/ajouterEvenement.inc.php") ;
						break ;
						
						
					case "ajoutArtiste" :
						include("FO/modeles/artistes/ajouterArtiste.inc.php") ;
						break ;
						
					case "suprEvent" :
						include("FO/modeles/evenements/supprimerEvenement.inc.php") ;
						break ;
						
					case "suprArtiste" :
						include("FO/modeles/artistes/supprimerArtiste.inc.php") ;
						break ;
						
					case "modifLien" :
						include ("FO/modeles/stream/modifierLien.inc.php") ;
						break ;
					
					case "ajoutTypEvent" :
						include("FO/modeles/typevenements/ajouterTypevenement.inc.php");
						break;
					// Inc
					case "verifLogin" :
						include ("inc/verifLogin.inc.php") ;
						break ;
					case "modifInfos" :
						include ("FO/modeles/infos/modifierInfos.inc.php");
						break;
						
					// On définie la page par défaut	
					default :
						include("FO/vues/FO_accueil.php") ;
				}
?>
			</div>
		</section>

	</article>
	<!-- Pied de page -->
	<?php require("mdl/footer.php") ; ?>
		
	</body>
</html>