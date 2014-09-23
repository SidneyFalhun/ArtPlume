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
	// On envoie le nom, le prenom, la photo, la description et le lien d'un artiste à la page ajoutArtiste
?>
		<fieldset>
			<legend>Ajouter un artiste </legend>

	

			 
				<form id="ajoutArtiste" action="?page=ajoutArtiste" method="POST" enctype="multipart/form-data">
					<ul>
						<li><label>Nom:</label> <input type="text" name="txtNom" ></li>
						<li><label>Prénom:</label> <input type="text" name="txtPrenom"  ></li>
						<li><label>Photo:</label> <input type="file" name="image"  /></li>
						<li><label>Description:</label> <textarea name="txtDescription" ></textarea></li>						
						<li><label>Lien:</label> <input type="text" name="txtLien" ></li>
					</ul> 
					<input type="submit" name="butAjoutArtiste" value="Ajouter" /> <a href="?page=consulterArtistes">Retour</a>
				</form>
		</fieldset>
<?php
	}
?>