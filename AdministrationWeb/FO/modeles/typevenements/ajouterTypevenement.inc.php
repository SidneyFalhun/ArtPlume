<?php
	// Petit code permettant de vérifier si on est connecté
	if (empty($_SESSION['login']))
	{
?>
		<script language="javaScript">
			document.location.href="?page=accueil"
		</script>
<?php
	}
	else
	{
		/*
		* On verifie si tout les champs sont remplis du formulaire
		* si les champs sont remplis on insere les informations concernant le type d'evenement dans la bdd à l'aide des variables
		* si les champs ne sont pas remplis alors on affiche un message d'erreur
		*/
		if (!empty($_POST["txtType"]) )
		{
			
				$type = $_POST["txtType"];
				
				$req="INSERT INTO  typeevenements(typ_libelle) 
					VALUES(:type);";
				$out = $_SESSION['bdd']->exec($req, array('type'=>$type));
?>	
				Ajout du type d'événement effectué avec succès.
				<script language="javaScript">
					document.location.href="?page=consulterEvenements"
				</script>
<?php
		}
		else
		{
?>
		Veuillez remplir tous les champs.
		<script language="javaScript">
			document.location.href="?page=consulterEvenements"
		</script>
<?php
		}
	}
?>