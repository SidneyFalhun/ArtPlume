<?php


	/*
	* code permettant d'ajouter un message dans la bdd pour contacter l'association
	*/
	if ( !empty($_POST['sujet']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['message']) )
	{
		$sujet = $_POST['sujet'];
		$nom =   $_POST['nom'];
		$prenom = $_POST['prenom'] ;
		$email = $_POST['email'];
		$contenu = $_POST['message'];
		$etat = 1;

 
		$req="INSERT INTO  messages (mes_sujet, mes_nom ,mes_prenom, mes_email, mes_contenu, mes_etat )
				VALUES (:sujet, :nom, :prenom, :email, :contenu, :etat)";
		$out = $_SESSION['bdd']->exec($req, array('sujet'=>$sujet, 'nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'contenu'=>$contenu, 'etat'=>$etat));
	?>
		Message envoyé avec succès vous pouvez retourner à l'accueil.
	<?php
	}
	else
	{
?>
		Tous les champs doivent être renseignés. <br/><a href="?page=ajouterMessage">Retour</a>
<?php
	}
?>
