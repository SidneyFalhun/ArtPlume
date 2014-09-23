<?php
	/*
	* code permettant de recuperer le lien de stream pour l'application android
	*/
	$req ="SELECT STR_ID, STR_LIEN
			from stream";
	$leLien =  $_SESSION['bdd']->query($req);
	//on encode en JSON
	print(json_encode($leLien));
	return ($leLien);
?>