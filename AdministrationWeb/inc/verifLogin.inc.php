<?php
	// Petit code permettant de vérifier si on est connecté
	if (!empty($_SESSION['login']))
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
		* On recupere le login et le mdp
		* on recupere le nombre d'id correspondant au login et au mdp
		* si le nombre est null ou = à 0 alors on redirige vers l'accueil et on affiche un message d'erreur
		* sinon on definie la session login avec la variable $login
		*/
		$login = $_POST['txtLogin'];
		$mdp = md5($_POST['txtMdp']);	
		$req = "SELECT COUNT(UTI_CODE) AS nb
                  FROM utilisateur
                   WHERE UTI_LOGIN = :login
                    AND UTI_MDP = :mdp";
        $data = $_SESSION['bdd']->query($req ,
                array('login'=>$login, 'mdp'=>$mdp),Bdd::SINGLE_RES);
		if (!empty($data->nb))
		{
			$_SESSION['login'] = $login;
?>
			Connexion à l'application réussie.
			<script language="javaScript">
				document.location.href="?page=accueil"
			</script>
<?php	
		}
		else
		{
?>
			Login ou mot de passe incorrect.
			<script language="javaScript">
				document.location.href="?page=accueil"
			</script>
					
<?php	
		}
	}
?>