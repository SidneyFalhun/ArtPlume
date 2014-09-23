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
		* puis on envoie les informations modifiées dans la bdd.
		*/
		if (!empty($_POST['codeEvent']))
		{
			require_once("FO/modeles/evenements/lireEvenements.inc.php") ;
?>
			<fieldset>
				<legend>Modifier un événement</legend>
<?php	
				$code = $_POST['codeEvent'];
				$unEvenement = getUnEvenement($code) ;
				$typeEvents = getTypeEvent();
?>
		
				<form id="modifEvent" action="?page=modifEvent" method="POST" enctype="multipart/form-data">	
					<ul>	
						<li><label>Titre:</label> <input type="text" name="txtTitre" value="<?php echo htmlspecialchars($unEvenement->EVE_TITRE); ?>"></li>
						<li><label>Lieu:</label> <input type="text" name="txtLieu" value="<?php echo  htmlspecialchars($unEvenement->EVE_LIEU); ?>"></li>
						<li><label>Date:</label> <input type="text" name="txtDate" id="date"  value="<?php echo  htmlspecialchars($unEvenement->EVE_DATE); ?>"></li>
						<li><label>Photo:</label> <input type="text"  name="txtImage" value="<?php echo  htmlspecialchars($unEvenement->EVE_IMAGE); ?>"> <input type="file" name="image" /></li>
						<li><label>Description:</label> <textarea name="txtDescription" ><?php echo  stripslashes(htmlspecialchars($unEvenement->EVE_DESCRIPTION)); ?></textarea></li>
						<li><label>Lien:</label> <input type="text" name="txtLien" value="<?php echo  htmlspecialchars($unEvenement->EVE_LIEN); ?>"></li>
						<li><label>Type:</label><select id="lstType" name="lstType" >
<?php
						foreach ($typeEvents as $unType)
						{
?>
							<option value="<?php echo  htmlspecialchars($unType->TYP_CODE); ?>"><?php echo  htmlspecialchars($unType->TYP_LIBELLE); ?></option>
<?php
						}
?>
						</select></li>
						<input type="hidden" name="hidCode" value="<?php echo  htmlspecialchars($code); ?>" />
		
					</ul> 
					<input type="submit" name="butModifEvent" value="Modifier" /> <a href="?page=consulterEvenements">Retour</a>
				</form>
			</fieldset>
			<script>
				$(document).ready(function(){
				$('button').button();
				$('#date').datepicker($.datepicker.regional[ "fr" ] );
				});
			</script>
<?php	
		}
		else
		{
?>
			<script language="javaScript">
				document.location.href="?page=consulterEvenements"
			</script>
<?php
		}
	}
?>