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
		/* On envoie le type d'un evenement dans la bdd avec la page ajoutTypEvent
		*/
?>
		<fieldset>
			<legend>Ajouter un type d'évènement</legend>

	

			 
			<form id="ajoutTypEvent" action="?page=ajoutTypEvent" method="POST" enctype="multipart/form-data">
				<ul>
					<li><label>Type:</label> <input type="text" name="txtType" ></li>
				</ul> 
				<input type="submit" name="butAjoutTypEvent" value="Ajouter" /> <a href="?page=consulterEvenements">Retour</a>
			</form>
		</fieldset>
<?php
	}
?>