<?php
		/*
		* page permettant d'afficher la liste des evenements grâce à la fonction getLesEvenements()
		*/
		require_once("FO/modeles/evenements/lireEvenements.inc.php") ;

			$evenements = getLesEvenements() ;
			if (empty($evenements))
			{
?>
				Il n'y a aucun événement.
<?php
			}
			else
			{
				foreach ($evenements as $lEvenement)
				{
?>
					<form id="<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>Lire" action="?page=lireEve" method="POST">
						<input type="hidden" name="codeEve" value="<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>"/>
					</form>
					<ul>
						<li><?php echo htmlspecialchars($lEvenement->EVE_TITRE); ?></li>
						<li>le <?php echo htmlspecialchars($lEvenement->EVE_DATE); ?></li>
						<a  href='#' onclick='document.getElementById("<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>Lire").submit()'>Afficher plus >></a>
					</ul> 
					
<?php
			}
				}
?>

