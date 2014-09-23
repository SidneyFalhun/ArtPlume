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
		require_once("FO/modeles/artistes/lireArtistes.inc.php") ;
		/* On recupere le nom, le prenom, la photo, la description, l'âge et le lien d'un artiste selectionné 
		* et on modifie les informations de l'artiste selectionné
		*/
?>

		<fieldset>
			<legend>Modifier un artiste</legend>
<?php	
			$code = $_POST['codeArtiste'];
			$unArtiste = getUnArtiste($code) ;
?>
				<form id="modifArtiste" action="?page=modifArtiste" method="POST" enctype="multipart/form-data">
				
					<ul>
						<li><label>Nom:</label> <input type="text" name="txtNom" value="<?php echo htmlspecialchars($unArtiste->ART_NOM); ?>"></li>
						<li><label>Prénom:</label> <input type="text" name="txtPrenom" value="<?php echo htmlspecialchars($unArtiste->ART_PRENOM); ?>"></li>
						<li><label>Photo:</label> <input type="text" name="txtPhoto" value="<?php echo htmlspecialchars($unArtiste->ART_PHOTO); ?>"> <input type="file" name="image"  /></li>
						<li><label>Description:</label> <textarea name="txtDescription" ><?php echo stripslashes($unArtiste->ART_DESCRIPTION); ?></textarea></li>
						<li><label>Lien:</label> <input type="text" name="txtLien" value="<?php echo htmlspecialchars($unArtiste->ART_LIEN); ?>"></li>
						<input type="hidden" name="hidCode" value="<?php echo htmlspecialchars($code); ?>" />
					</ul> 
					<input type="submit" name="butModifArtiste" value="Modifier" /> <a href="?page=consulterArtistes">Retour</a>
				</form>
		</fieldset>
<?php
	}
?>