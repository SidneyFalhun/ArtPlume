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
		/* On recupere le sujet et le mail des messages dans la bdd avec la fonction getLesMessages
		* et on affiche en gras les messages non lus
		*/
		require_once("FO/modeles/messages/lireMessages.inc.php") ;
?>
		<fieldset>
			<legend>Liste des messages</legend>
<?php	
			$messages = getLesMessages() ;
			if (empty($messages))
			{
?>
				Vous n'avez reçu aucun message.
<?php
			}
			else
			{

				foreach ($messages as $leMessage)
				{
					$etatMess = getEtatMess( $leMessage->MES_CODE) ;
?>
					<form id="<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>Lire" action="?page=lireMess" method="POST">
						<input type="hidden" name="codeMess" value="<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>"/>
					</form>
					<ul>
					
<?php
					
						if ($etatMess == 1)
						{
?>
							<li><a class="nonlu" href='#' onclick='document.getElementById("<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>Lire").submit()'><?php echo  stripslashes(htmlspecialchars($leMessage->MES_SUJET)); ?><br/><?php echo  stripslashes(htmlspecialchars($leMessage->MES_EMAIL)) ; ?></a>  </li></b>
<?php					
						}
						else
						{
?>
							<li><a class="lu" href='#' onclick='document.getElementById("<?php echo  htmlspecialchars($leMessage->MES_CODE) ; ?>Lire").submit()'><?php echo  stripslashes(htmlspecialchars($leMessage->MES_SUJET)); ?><br/><?php echo  stripslashes(htmlspecialchars($leMessage->MES_EMAIL)) ; ?></a>  </li>
<?php
						}
?>
					</ul>
				
					----
<?php
				}
			}
?>	
		</fieldset>
<?php
	}
?>