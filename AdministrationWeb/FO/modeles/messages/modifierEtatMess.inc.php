<?php
	FUNCTION changeLu($code)
				{
					/*
					* fonction permettant de modifier l'état d'un message par 2 pour qu'il soit vu comme lu
					*/
					$sReq = "UPDATE messages
								SET MES_ETAT = 2
								WHERE MES_CODE = :code";		
					$reqExec = $_SESSION['bdd']->exec($sReq, array('code'=>$code));
					return $reqExec;
				}