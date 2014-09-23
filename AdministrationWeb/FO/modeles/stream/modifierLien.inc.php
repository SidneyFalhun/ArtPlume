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
		* si les champs sont remplis on modifie les informations concernant le lien de stream correspondant à l'id dans la bdd à l'aide des variables
		* si les champs ne sont pas remplis alors on affiche un message d'erreur
		*/
		if ( !empty($_POST['txtLien']) && !empty($_POST['hidLien']) )
		{
			$lien = $_POST['txtLien'];
			$code = $_POST['hidLien'];
			$sReq = "UPDATE stream
					SET STR_LIEN = :lien
					WHERE STR_ID = :code";
			$reqExec = $_SESSION['bdd']->exec($sReq, array('code'=>$code, 'lien'=>$lien));
?>
			Modification du lien effectuée avec succès.
			<script language="javaScript">
				document.location.href="?page=modifierLien"
			</script>
<?php
		}
		else
		{
?>
			Veuillez remplir tous les champs.
			<script language="javaScript">
				document.location.href="?page=modifierLien"
			</script>
<?php
		}
	}
?>