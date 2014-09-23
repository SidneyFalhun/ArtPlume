<?php
	/*
	* fonction permettant de recuperer les informations de l'association
	*/
	FUNCTION getInfos()
			{
				$code = '1';
				$sReq = "SELECT INF_ID, INF_NOM, INF_TEL, INF_MAIL, INF_RUE, INF_VILLE, INF_COPOS, INF_SITE
							FROM info
							WHERE INF_ID = :code";
				
				$info = $_SESSION['bdd']->query($sReq, array('code'=>$code), Bdd::SINGLE_RES);
				return $info;
			}