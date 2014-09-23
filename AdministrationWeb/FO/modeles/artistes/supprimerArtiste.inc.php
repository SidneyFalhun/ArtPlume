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
		* On verifie si le code de l'artiste est bien présent
		* si le code est bien présent on supprime l'artiste dans la bdd correspondant à l'id
		* si le code de l'artiste n'est pas renseigné on affiche un message d'erreur
		*/
		if (!empty($_POST['codeArtiste']))
		{
			$code = $_POST['codeArtiste'];
			$sReq = "DELETE FROM artistes WHERE ART_CODE = :code";
			$reqExec = $_SESSION['bdd']->exec($sReq, array('code'=>$code));
?>
			Supression de l'artiste effectuée avec succès.
			<script language="javaScript">
				document.location.href="?page=consulterArtistes"
			</script>
<?php
		}
		else
		{
?>
			Erreur lors de la supression.
			<script language="javaScript">
				document.location.href="?page=consulterArtistes"
			</script>
<?php
		}
	}
?>