<?php
		/*
		* page permettant d'afficher un artiste avec la fonction getUnArtiste()
		*/
		if (!empty($_POST['codeArt']))
		{
			require_once("FO/modeles/artistes/lireArtistes.inc.php") ;
			

				$code = $_POST['codeArt'];
				$artiste = getUnArtiste($code) ;
				
				
				
?>					
					
					<ul>
						
						<li><?php echo htmlspecialchars($artiste->ART_PRENOM); ?></li>
						<li><?php echo htmlspecialchars($artiste->ART_NOM); ?></li>
						<li><img src="../<?php echo ($artiste->ART_PHOTO); ?>" /></li>
						<li><?php echo stripslashes($artiste->ART_DESCRIPTION); ?></li>
						<li><a href="<?php echo stripslashes($artiste->ART_LIEN); ?>"><?php echo stripslashes($artiste->ART_LIEN); ?></a></li>
						
						
							<a href="?page=consulterArtistes">Retour</a></li>
					</ul>
				

			
<?php
		}
		else
		{
?>
			<script language="javaScript">
				document.location.href="?page=consulterArtistes"
			</script>
<?php
		}
	