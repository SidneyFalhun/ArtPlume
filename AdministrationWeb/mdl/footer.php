<footer>
				<div class="row-top">
					
				</div>
				<div class="row-bot">
					<div class="aligncenter">
<?php
						if (!empty($_SESSION['login']))
						{
?>
							<a href="?page=deconnexion">Se deconnecter</a><br/>
<?php
						}
						else
						{
?>
							<a href="?page=connexion">Connexion</a><br/>
<?php
						}
?>
						<p class="p0">Website Template by <a href="http://store.templatemonster.com?aff=netsib1" target="_blank" rel="nofollow">www.templatemonster.com</a></p>
						3D Models provided by <a href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a><br/ >
						<p class="p0">Administration créée par Sidney Falhun pour <a href="http://www.artplume.org" target="_blank" rel="nofollow">Artplume</a> &copy; 2014</p>
						<!-- {%FOOTER_LINK} -->
					</div>
				</div>
			</footer>