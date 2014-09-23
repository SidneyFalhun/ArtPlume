<?php
	/*
	* fonction permettant de recuperer le code, le nom, le prénom, la photo, l'age et la description de tous les artistes
	*/
	FUNCTION getLesArtistes()
			{
				$sReq = "SELECT ART_CODE, ART_NOM, ART_PRENOM, ART_PHOTO, ART_AGE, ART_DESCRIPTION
							FROM artistes";		
				$lesArtistes = $_SESSION['bdd']->query($sReq);
				return $lesArtistes;
			}
	
	/*
	* fonction permettant de recuperer le code, le nom, le prénom, la photo, l'age et la description d'un artiste
	*/
	FUNCTION getUnArtiste($code)
			{
				$sReq = "SELECT ART_CODE, ART_NOM, ART_PRENOM, ART_PHOTO, ART_AGE, ART_DESCRIPTION, ART_LIEN
							FROM artistes
							WHERE ART_CODE = :code";
				
				$artiste = $_SESSION['bdd']->query($sReq, array('code'=>$code), Bdd::SINGLE_RES);
				return $artiste;
			}