<?php
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
		session_destroy();
?>
		Déconnexion en cours...
		<script language="javaScript">
			document.location.href="?page=accueil"
		</script>
<?php
	}
?>