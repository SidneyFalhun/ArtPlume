<?php
	/*
	* fonction permettant de recuperer le code, le sujet, le nom, le prénom, l'email et le contenu de tous les messages
	*/
	FUNCTION getLesMessages()
			{
				$sReq = "SELECT MES_CODE, MES_SUJET, MES_NOM, MES_PRENOM, MES_EMAIL, MES_CONTENU
							FROM messages";		
				$lesMessages = $_SESSION['bdd']->query($sReq);
				return $lesMessages;
			}
			
	/*
	* fonction permettant de recuperer le code, le sujet, le nom, le prénom, l'email et le contenu d'un message
	*/
	FUNCTION getLeMessage($code)
			{
				$sReq = "SELECT MES_CODE, MES_SUJET, MES_NOM, MES_PRENOM, MES_EMAIL, MES_CONTENU
							FROM messages
							WHERE MES_CODE = :code";
				$leMessage = $_SESSION['bdd']->query($sReq, array('code'=>$code));
				return $leMessage;
			}
	
	/*
	* fonction permettant de recuperer l'état d'un message
	*/	
	FUNCTION getEtatMess($code)
			{
				$sReq = "SELECT MES_ETAT
							FROM messages
							WHERE MES_CODE = :code";
				$etat = $_SESSION['bdd']->query($sReq, array('code'=>$code), Bdd::SINGLE_RES);
				return $etat->MES_ETAT;
			}