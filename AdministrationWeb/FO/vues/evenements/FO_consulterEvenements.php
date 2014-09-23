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
		/* On recupere le titre, le lieu, la date, la photo, la description, le lien et le type des evenements dans la bdd avec la fonction getLesEvenements
		*/
		require_once("FO/modeles/evenements/lireEvenements.inc.php") ;
?>
		<a href="?page=ajouterEvenements">Ajouter un événement</a> | <a href="?page=ajouterTypEvent">Ajouter un type d'événement</a>
		<fieldset>
			<legend>Liste des evenements</legend>
<?php	
			$evenements = getLesEvenements() ;
			if (empty($evenements))
			{
?>
				Il n'y a aucun événement, pensez à en ajouter.
<?php
			}
			else
			{
				foreach ($evenements as $lEvenement)
				{
?>
					<form id="<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>Modif" action="?page=modifierEvent" method="POST">
						<input type="hidden" name="codeEvent" value="<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>"/>
					</form>
					<form id="<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>Supr" action="?page=suprEvent" method="POST">
						<input type="hidden" name="codeEvent" value="<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>"/>
					</form>
					<ul>
						<li>Titre: <?php echo htmlspecialchars($lEvenement->EVE_TITRE); ?></li>
						<li>Lieu: <?php echo htmlspecialchars($lEvenement->EVE_LIEU); ?></li>
						<li>Date: <?php echo htmlspecialchars($lEvenement->EVE_DATE); ?></li>
						<li><img src="<?php echo htmlspecialchars($lEvenement->EVE_IMAGE); ?>" /></li>
						<li>Description: <?php echo stripslashes(htmlspecialchars($lEvenement->EVE_DESCRIPTION)); ?></li>
						<li>Lien: <?php echo htmlspecialchars($lEvenement->EVE_LIEN); ?></li>
						<li>Type: <?php echo htmlspecialchars($lEvenement->TYP_LIBELLE); ?></li>
						<li><a href='#' onclick='document.getElementById("<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>Modif").submit()'>Modifier l'événement</a> |
						<a href='#' onclick='document.getElementById("<?php echo htmlspecialchars($lEvenement->EVE_CODE) ; ?>Supr").submit()'>Supprimer l'événement</a></li>
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