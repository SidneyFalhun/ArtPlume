
<nav>
						<ul class="menu">
						  <li><a  href="?page=accueil">Accueil</a></li>
<?php 
						if (!empty($_SESSION['login']))
							{
?>
								<li><a href="?page=consulterMessages">Messages</a></li>
								<li><a href="?page=consulterEvenements">Evenements</a></li>
								<li><a href="?page=consulterArtistes">Artistes</a></li>
								<li><a href="?page=modifierLien">Stream</a></li>
								<li><a href="?page=modifierInfos">Infos</a></li>
<?php
							}
?>
						 
						</ul>
					</nav>
				</div>
				
			</header>