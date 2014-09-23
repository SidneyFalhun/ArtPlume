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
		/* On envoie le titre, le lieu, la date, la photo, la description, le lien et le type d'un evenement dans la bdd avec la page ajoutEvent
		* en recuperant le type de l'evenement avec la fonction getTypeEvent()
		*/
		require_once("FO/modeles/evenements/lireEvenements.inc.php");
?>
		<fieldset>
			<legend>Ajouter un événement</legend>

	
<?php
			$typeEvents = getTypeEvent();
?>
			 
			<form id="ajoutEvent" action="?page=ajoutEvent" method="POST" enctype="multipart/form-data">
				<ul>
					<li><label>Titre:</label> <input type="text" name="txtTitre" ></li>
					<li><label>Lieu:</label> <input type="text" name="txtLieu" ></li>
					<li><label>Date:</label> <input type="text" name="txtDate" id="date" ></li>
					<li><label>Photo:</label> <input type="file" name="image"   /></li>
					<li><label>Description:</label> <textarea name="txtDescription" ></textarea></li>
					<li><label>Lien:</label> <input type="text" name="txtLien" ></li>
					<li><label>Type:</label><select id="lstType" name="lstType" >
<?php
					foreach ($typeEvents as $unType)
					{
?>
						<option value="<?php echo $unType->TYP_CODE; ?>"><?php echo $unType->TYP_LIBELLE; ?></option>
<?php
					}
?>
					</select></li>
		
				</ul> 
				<input type="submit" name="butAjoutEvent" value="Ajouter" /> <a href="?page=consulterEvenements">Retour</a>
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
?>