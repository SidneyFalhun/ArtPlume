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
		/* On recupere le lien de stream avec la fonction getUnLien()
		* et on le modifie en cliquant sur modifier
		*/
		require_once("FO/modeles/stream/lireStream.inc.php") ;
?>
		<fieldset>
			<legend>Modifier le lien du stream</legend>
<?php	
			$Lien = getUnLien();
?>
			<form id="modifLien" action="?page=modifLien" method="POST">
<?php	
				foreach ($Lien as $unLien)
				{
?>	
					<ul>
						<li><label>Lien:</label> <input type="text" name="txtLien" value="<?php echo  htmlspecialchars($unLien->STR_LIEN); ?>"></li>
					</ul>
					<input type="hidden" name="hidLien" value="<?php echo  htmlspecialchars($unLien->STR_ID); ?>" />
<?php
				}
?>
					<input type="submit" name="butModifLien" value="Modifier" /> <a href="?page=accueil">Retour</a>
			</form>
		</fieldset>
<?php
}
?>