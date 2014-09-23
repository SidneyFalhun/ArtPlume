<?php
	/*
	* fonction permettant de recuperer lelien de stream
	*/
	FUNCTION getUnLien()
			{
				$sReq = "SELECT STR_ID, STR_LIEN
							FROM stream";
				
				$lien = $_SESSION['bdd']->query($sReq);
				return $lien;
			}
			