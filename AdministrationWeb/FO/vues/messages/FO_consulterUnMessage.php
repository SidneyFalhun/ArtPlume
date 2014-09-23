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
		/* On recupere le sujet, le nom, le prenom, l'email et le contenu d'un message dans la bdd avec la fonction getLeMessage
		* si l'état du message était non lu (1) alors on le passe à lu (2)
		*/
		if (!empty($_POST['codeMess']))
		{
			require_once("FO/modeles/messages/lireMessages.inc.php") ;
			require_once("FO/modeles/messages/modifierEtatMess.inc.php");
?>
			<fieldset>
				<legend>Message</legend>
<?php	
				$code = $_POST['codeMess'];
				$message = getLeMessage($code) ;
				$etatMess = getEtatMess($code) ;
				if ($etatMess == 1)
				{
					changeLu($code);
				}
				foreach ($message as $leMessage)
				{
?>
					
					<form id="<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>Supr" action="?page=suprMess" method="POST">
						<input type="hidden" name="codeMess" value="<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>"/>
					</form>
					<ul>
						<li>Sujet: <?php echo  stripslashes(htmlspecialchars($leMessage->MES_SUJET)); ?></li>
						<li>Nom: <?php echo  htmlspecialchars($leMessage->MES_NOM); ?></li>
						<li>Prenom: <?php echo  htmlspecialchars($leMessage->MES_PRENOM); ?></li>
						<li>Email: <?php echo  htmlspecialchars($leMessage->MES_EMAIL); ?>  <a href="mailto:<?php echo  htmlspecialchars($leMessage->MES_EMAIL); ?>?subject=Re: <?php echo  htmlspecialchars($leMessage->MES_SUJET); ?>">Répondre par mail</a></li>
						<li>Contenu: <?php echo  stripslashes(htmlspecialchars($leMessage->MES_CONTENU)); ?></li>
						<li><a href='#' onclick='document.getElementById("<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>Supr").submit()'>Supprimer</a>
							<a href="?page=consulterMessages">Retour</a></li>
					</ul>
				
					
<?php
				}
?>	
			</fieldset>
<?php
		}
		else
		{
?>
			<script language="javaScript">
				document.location.href="?page=consulterMessages"
			</script>
<?php
		}
	}
?>