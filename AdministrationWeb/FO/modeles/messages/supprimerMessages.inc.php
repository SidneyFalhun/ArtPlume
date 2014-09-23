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
		* On verifie si le code du message est bien présent
		* si le code est bien présent on supprime le message dans la bdd correspondant à l'id
		* si le code du message n'est pas renseigné on affiche un message d'erreur
		*/
		if ( !empty($_POST['codeMess']) )
		{
			$code = $_POST['codeMess'];
			$sReq = "DELETE FROM messages WHERE Mes_code = :code";
			$reqExec = $_SESSION['bdd']->exec($sReq, array('code'=>$code));
?>
			Supression du message effectuée avec succès.
			<script language="javaScript">
				document.location.href="?page=consulterMessages"
			</script>
<?php
		}
		else
		{
?>
			Erreur lors de la supression.
			<script language="javaScript">
				document.location.href="?page=consulterMessages"
			</script>
<?php
		}
	}