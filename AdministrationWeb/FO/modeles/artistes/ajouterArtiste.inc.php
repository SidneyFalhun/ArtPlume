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
		/*
		* On verifie si tout les champs sont remplis du formulaire
		* si les champs sont remplis on recupere l'image envoyée precedemment
		* puis on insere les informations concernant l'artiste dans la bdd à l'aide des variables
		* si les champs ne sont pas remplis alors on affiche un message d'erreur
		*/
		if (!empty($_POST["txtNom"]) && !empty($_POST["txtLien"]) && !empty($_POST["txtPrenom"]) && !empty($_FILES['image']) && !empty($_POST["txtDescription"]) )
		{
			 
				$dossier = 'upload/artistes/';
				$fichier = basename($_FILES['image']['name']);
				if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				{
					$photo = $dossier . $fichier;
				}
				else 
				{
?>
					<script language="javaScript">
						document.location.href="?page=consulterArtistes"
					</script>
<?php
				}
			
			
			$nom = $_POST["txtNom"];
			$prenom = $_POST["txtPrenom"];
			$description = $_POST["txtDescription"];
			$lien = $_POST["txtLien"];
			
	
				$req="INSERT INTO artistes(art_nom, art_prenom, art_photo, art_description, art_lien)
						VALUES(:nom, :prenom, :photo, :description, :lien);";
				$reqExec = $_SESSION['bdd']->exec($req, array('nom'=>$nom, 'prenom'=>$prenom, 'photo'=>$photo, 'description'=>$description, 'lien'=>$lien));
?>
				Ajout de l'artiste effectué avec succès.
				<script language="javaScript">
					document.location.href="?page=consulterArtistes"
				</script>
<?php
			
		}
		else
		{
?>
			Veuillez remplir tous les champs.
			<script language="javaScript">
				document.location.href="?page=consulterArtistes"
			</script>
<?php
		}

	}
?>