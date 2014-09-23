<?php
		/*
		* page permettant d'afficher la liste des artistes grâce à la fonction getLesArtistes()
		*/
		require_once("FO/modeles/artistes/lireArtistes.inc.php") ;
	
			$artistes = getLesArtistes() ;	

			if (empty($artistes))
			{
?>
				Il n'y a aucun artiste.
<?php
			}
			else
			{
				foreach ($artistes as $lArtiste)
				{
?>
					<form id="<?php echo htmlspecialchars($lArtiste->ART_CODE) ; ?>Lire" action="?page=lireArt" method="POST">
						<input type="hidden" name="codeArt" value="<?php echo htmlspecialchars($lArtiste->ART_CODE) ; ?>"/>
					</form>
				
					<ul>
						<li> <?php echo htmlspecialchars($lArtiste->ART_PRENOM); ?></li>
						<li> <?php echo htmlspecialchars($lArtiste->ART_NOM); ?></li>
						<a  href='#' onclick='document.getElementById("<?php echo htmlspecialchars($lArtiste->ART_CODE) ; ?>Lire").submit()'>Afficher plus >></a>
						
					</ul> 
					
<?php
				}
			}
?>

