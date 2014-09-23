<?php
	/*
	* code permettant d'envoyer un mail à l'adresse technique@artplume.org pour rejoindre la newsletter
	*/
	if ( !empty($_POST['mail']) )
	{
		$newMail = $_POST['mail'];
		$mailDesti = 'Sidney.falhun@live.fr';
		$sujet = 'ajout dans la newsletter de '.$newMail.'.';
		$message = $newMail . ' cette adresse mail a demandé à rejoindre la newsletter';
		mail($mailDesti, $sujet, $message);
?>
		Demande pour rejoindre la newsletter envoyée avec succès vous pouvez retourner à l'accueil.
<?php
	}
	else
	{
?>
		L'adresse mail doit être renseignée. <br/><a href="?page=envoyerMail">Retour</a>
<?php
	}
?>