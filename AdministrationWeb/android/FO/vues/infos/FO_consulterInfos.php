<?php
		/*
		* page permettant d'afficher les informations de l'association grâce à la fonction getLesInfos()
		*/
		require_once("FO/modeles/infos/lireInfos.inc.php") ;
	
			$infos = getLesInfos() ;	


				foreach ($infos as $info)
				{
?>
					
				
					<ul>
						<li> <?php echo htmlspecialchars($info->INF_NOM); ?></li>
						<li> <?php echo htmlspecialchars($info->INF_TEL); ?></li>
						<li> <?php echo htmlspecialchars($info->INF_MAIL); ?></li>
						<li> <?php echo htmlspecialchars($info->INF_RUE); ?></li>
						<li> <?php echo htmlspecialchars($info->INF_COPOS); ?> <li> <?php echo htmlspecialchars($info->INF_VILLE); ?></li></li>
						<li> <?php echo htmlspecialchars($info->INF_SITE); ?></li>
						
						
					</ul> 
					
<?php
				}
?>
