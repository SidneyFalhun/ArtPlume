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
		* puis on modifie les informations concernant l'evenement correspondant à l'id dans la bdd à l'aide des variables
		* si les champs ne sont pas remplis alors on affiche un message d'erreur
		*/
		if (!empty($_POST['txtTitre']) && !empty($_POST['txtLieu']) && !empty($_POST['txtDate']) && !empty($_POST['txtDescription']) && !empty($_POST['txtLien']) && !empty($_POST['lstType']) && !empty($_POST['hidCode']))
		{
			if (!empty($_POST['txtImage']) )
			{
				$photo = $_POST['txtImage'];
			}
			else 
			{
				$dossier = 'upload/evenements/';
				$fichier = basename($_FILES['image']['name']);
				if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				{
					$photo = $dossier.$fichier;
				}
				else //Sinon (la fonction renvoie FALSE).
				{
?>
					<script language="javaScript">
						document.location.href="?page=consulterEvenements"
					</script>
<?php
				}
			}
			
				
			$titre = $_POST['txtTitre'];
			$lieu = $_POST['txtLieu'];
			$date = $_POST['txtDate'];
			
			$description = $_POST['txtDescription'];
			$lien = $_POST['txtLien'];
			$type = $_POST['lstType'];
			$code = $_POST['hidCode'];
			$req = "UPDATE evenements
					SET EVE_TITRE = :titre,
					EVE_LIEU = :lieu,
					EVE_DATE = :date,
					EVE_IMAGE = :image,
					EVE_DESCRIPTION = :description,
					EVE_LIEN = :lien,
					EVE_TYPE = :type
					WHERE EVE_CODE = :code";
			$reqExec = $_SESSION['bdd']->exec($req, array('titre'=>$titre, 'lieu'=>$lieu, 'date'=>
									$date, 'image'=>$photo, 'description'=>$description,
									'lien'=>$lien, 'code'=>$code, 'type'=>$type));
?>
			Modification de l'événement effectuée avec succès.	
			<script language="javaScript">
				document.location.href="?page=consulterEvenements"
			</script>
<?php	
		}
		else
		{
?>
			Veuillez remplir tous les champs.
			<script language="javaScript">
				document.location.href="?page=consulterEvenements"
			</script>
<?php
		}
	}
?>