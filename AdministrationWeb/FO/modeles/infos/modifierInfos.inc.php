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
		* si les champs sont remplis on modifie les informations concernant les informations de l'association correspondant à l'id dans la bdd à l'aide des variables
		* si les champs ne sont pas remplis alors on affiche un message d'erreur
		*/
		if ( !empty($_POST['txtNom']) && !empty($_POST['txtTel'])  && !empty($_POST['txtMail']) && !empty($_POST['txtRue']) && !empty($_POST['hidCode']) && !empty($_POST['txtVille']) && !empty($_POST['txtCopos']) && !empty($_POST['txtSite']) )
		{

			
			$nom = $_POST['txtNom'];
			$tel = $_POST['txtTel'];
			$mail = $_POST['txtMail'];
			$rue = $_POST['txtRue'];
			$ville = $_POST['txtVille'];
			$copos = $_POST['txtCopos'];
			$site = $_POST['txtSite'];
			$code = $_POST['hidCode'];
			$req = "UPDATE info
					SET INF_NOM = :nom,
					INF_TEL = :tel,
					INF_MAIL = :mail,
					INF_RUE = :rue,
					INF_VILLE = :ville,
					INF_COPOS = :copos,
					INF_SITE = :site
					WHERE INF_ID = :code";
			$reqExec = $_SESSION['bdd']->exec($req, array('nom'=>$nom, 
			'tel'=>$tel, 'mail'=>$mail, 'rue'=>$rue, 'ville'=>$ville, 'copos'=>$copos, 'site'=>$site, 'code'=>$code));
?>
			Modification des informations effectuée avec succès.
			<script language="javaScript">
				document.location.href="?page=modifierInfos"
			</script>
<?php
		}
		else
		{
?>
			Veuillez remplir tous les champs.
			<script language="javaScript">
				document.location.href="?page=modifierInfos"
			</script>
<?php
		}
	}