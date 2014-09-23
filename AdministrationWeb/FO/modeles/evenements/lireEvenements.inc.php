<?php
	/*
	* fonction permettant de recuperer le code, le titre, le lieu, la date, l'image, la description, le lien et le libelle de tous les evenements
	*/
	FUNCTION getLesEvenements()
			{
				$sReq = "SELECT EVE_CODE, EVE_TITRE, EVE_LIEU, EVE_DATE, EVE_IMAGE, EVE_DESCRIPTION, EVE_LIEN, TYP_LIBELLE
							FROM evenements, typeevenements
							WHERE TYP_CODE = EVE_TYPE";		
				$lesEvenements = $_SESSION['bdd']->query($sReq);
				return $lesEvenements;
			}
	
	/*
	* fonction permettant de recuperer le code, le titre, le lieu, la date, l'image, la description, le lien et le libelle d'un evenement
	*/
	FUNCTION getUnEvenement($code)
			{
				$sReq = "SELECT EVE_CODE, EVE_TITRE, EVE_LIEU, EVE_DATE, EVE_IMAGE, EVE_DESCRIPTION, EVE_LIEN
							FROM evenements
							WHERE EVE_CODE = :code";
				
				$evenement = $_SESSION['bdd']->query($sReq, array('code'=>$code), Bdd::SINGLE_RES);
				return $evenement;
			}
	
	/*
	* fonction permettant de recuperer le code et le libelle de tous les types d'evenements
	*/	
	FUNCTION getTypeEvent()
			{
				$sReq = "SELECT TYP_CODE, TYP_LIBELLE
						FROM typeevenements;";
				$typeEvents = $_SESSION['bdd']->query($sReq);
				return $typeEvents;
			}