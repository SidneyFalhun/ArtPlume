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
		// On recupere le nom, le prenom, la photo, la description et le lien des artistes avec la page lireArtistes et la fonction getLesArtistes
		require_once("FO/modeles/artistes/lireArtistes.inc.php") ;
?>
		<a href="?page=ajouterArtiste">Ajouter un artiste</a>
		<fieldset>
			<legend>Liste des artistes</legend>
<?php	
			$artistes = getLesArtistes() ;	
?>
	
<?php
			if (empty($artistes))
			{
?>
				Il n'y a aucun artiste, pensez à en ajouter.
<?php
			}
			else
			{
				foreach ($artistes as $lArtiste)
				{
?>
				
					<form id="<?php echo  htmlspecialchars($lArtiste->ART_CODE) ; ?>Modif" action="?page=modifierArtiste" method="POST">
						<input type="hidden" name="codeArtiste" value="<?php echo  htmlspecialchars($lArtiste->ART_CODE) ; ?>"/>
					</form>
					<form id="<?php echo  htmlspecialchars($lArtiste->ART_CODE) ; ?>Supr" action="?page=suprArtiste" method="POST">
						<input type="hidden" name="codeArtiste" value="<?php echo  htmlspecialchars($lArtiste->ART_CODE) ; ?>"/>
					</form>
					<ul>
						<li>Nom: <?php echo  htmlspecialchars($lArtiste->ART_NOM); ?></li>
						<li>Prénom: <?php echo  htmlspecialchars($lArtiste->ART_PRENOM); ?></li>
						<li><img src="<?php echo  htmlspecialchars($lArtiste->ART_PHOTO); ?>" /></li>
						<li>Description: <?php echo  stripslashes(htmlspecialchars($lArtiste->ART_DESCRIPTION)); ?></li>
						<li>Lien: <?php echo  htmlspecialchars($lArtiste->ART_LIEN); ?></li>
						<li><a href='#' onclick='document.getElementById("<?php echo  htmlspecialchars($lArtiste->ART_CODE) ; ?>Modif").submit()'>Modifier l'artiste</a> | 
						<a href='#' onclick='document.getElementById("<?php echo  htmlspecialchars($lArtiste->ART_CODE) ; ?>Supr").submit()'>Supprimer l'artiste</a></li>
					</ul> 
					-----------------------------------------------------------
<?php
				}
			}
?>
		</fieldset>
<?php
	}
?>