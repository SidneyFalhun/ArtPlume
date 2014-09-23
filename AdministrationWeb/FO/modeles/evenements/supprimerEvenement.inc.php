
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
		* On verifie si le code de l'evenement est bien présent
		* si le code est bien présent on supprime l'evenement dans la bdd correspondant à l'id
		* si le code de l'evenement n'est pas renseigné on affiche un message d'erreur
		*/
		if ( !empty($_POST['codeEvent']) )
		{
			$code = $_POST['codeEvent'];
			$sReq = "DELETE FROM evenements WHERE EVE_CODE = :code";
			$reqExec = $_SESSION['bdd']->exec($sReq, array('code'=>$code));
?>
			Supression de l'événement effectuée avec succès.
			<script language="javaScript">
				document.location.href="?page=consulterEvenements"
			</script>
<?php
		}
		else
		{
?>
			Erreur lors de la supression.
			<script language="javaScript">
				document.location.href="?page=consulterEvenements"
			</script>
<?php
		}
	}
?>