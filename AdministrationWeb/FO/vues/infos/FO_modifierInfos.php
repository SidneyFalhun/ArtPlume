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
		/* On recupere le nom, le telephone, le mail, la rue, la ville, le code postal et le site internet correspondant aux informations de l'association dans la bdd avec la fonction getInfos()
		* puis on envoie les informations modifiées dans la bdd.
		*/
		require_once("FO/modeles/infos/lireInfos.inc.php") ;
?>

		<fieldset>
			<legend>Modifier les informations</legend>
<?php	
			
			$info = getInfos() ;
?>
				<form id="modifArtiste" action="?page=modifInfos" method="POST" enctype="multipart/form-data">
				
					<ul>
						<li><label>Nom:</label> <input type="text" name="txtNom" value="<?php echo htmlspecialchars($info->INF_NOM); ?>"></li>
						<li><label>Telephone:</label> <input type="text" name="txtTel" value="<?php echo htmlspecialchars($info->INF_TEL); ?>"></li>
						<li><label>Mail:</label> <input type="text" name="txtMail" value="<?php echo htmlspecialchars($info->INF_MAIL); ?>"></li>
						<li><label>Rue:</label> <input type="text" name="txtRue" value="<?php echo htmlspecialchars($info->INF_RUE); ?>"></li>
						<li><label>Ville:</label> <input type="text" name="txtVille" value="<?php echo htmlspecialchars($info->INF_VILLE); ?>"></li>
						<li><label>Code postal:</label> <input type="text" name="txtCopos" value="<?php echo htmlspecialchars($info->INF_COPOS); ?>"></li>
						<li><label>Site internet:</label> <input type="text" name="txtSite" value="<?php echo htmlspecialchars($info->INF_SITE); ?>"></li>
						<input type="hidden" name="hidCode" value="<?php echo htmlspecialchars($info->INF_ID); ?>" />
					</ul> 
					<input type="submit" name="butModifInfo" value="Modifier" /> <a href="?page=accueil">Retour</a>
				</form>
		</fieldset>
<?php
	}
?>