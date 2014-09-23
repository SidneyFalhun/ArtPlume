<?php
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
?>
		<fieldset>
			<legend>Connexion</legend>
			<form id="cnx" action="?page=verifLogin" method="POST">
				<ul>
					<li><label>Login:</label><input type="text" name="txtLogin" /></li>
					<li><label>Mot de passe:</label><input type="password" name="txtMdp" /></li>
				</ul>
				<input type="submit" name="butCnx" value="Se connecter" />
			</form>
		</fieldset>
<?php
	}
?>