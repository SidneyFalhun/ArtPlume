<?php
		/*
		* page permettant d'afficher un evenement grâce à la fonction getUnEvenement()
		*/
		if (!empty($_POST['codeEve']))
		{
			require_once("FO/modeles/evenements/lireEvenements.inc.php") ;
			
	
				$code = $_POST['codeEve'];
				$evenement = getUnEvenement($code) ;
				
				
				
?>					
					
					<ul>
						<li><?php echo htmlspecialchars($evenement->EVE_TITRE); ?></li>
						<li>à <?php echo htmlspecialchars($evenement->EVE_LIEU); ?></li>
						<li>le <?php echo htmlspecialchars($evenement->EVE_DATE); ?></li>
						<li><img src="../<?php echo ($evenement->EVE_IMAGE); ?>" /></li>
						<li><a href="<?php echo $evenement->EVE_LIEN; ?>">Lien</a></li>
						<li><?php echo stripslashes($evenement->EVE_DESCRIPTION); ?></li>
						
						
							<a href="?page=consulterEvenements">Retour</a></li>
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
	