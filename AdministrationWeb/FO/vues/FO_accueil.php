		Bienvenue sur le panel d'administration de l'application android.<br/>
		Ici vous pouvez:
		<ul>
			<li>- Gérer les messages.</li>
			<li>- Gérer les événements.</li>
			<li>- Gérer les artistes.</li>
			<li>- Gérer le lien du stream.</li>
			<li>- Gérer les informations d'Art Plume.</li>
		</ul>
<?php
		if(empty($_SESSION['login']))
		{
?>
			Vous devez être connecté pour pouvoir accéder à l'application.<br />
			<a href="?page=connexion">Se connecter</a>
<?php
		}
?>