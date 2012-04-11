<?php
	if(!isset($GLOBALS['PAGE_PAR_DEFAUT']))
		$GLOBALS['PAGE_PAR_DEFAUT'] = "accueil.php";
	
	if(!isset($GLOBALS['DOCTYPE']))
		$GLOBALS['DOCTYPE'] =
			'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">';

	if(!isset($GLOBALS['TITLE']))
		$GLOBALS['TITLE'] = '';

	if(!isset($GLOBALS['HEAD']))
		$GLOBALS['HEAD'] =
				'<head>
					<title>'.$GLOBALS['TITLE'].'</title>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				</head>';

	if(!isset($GLOBALS['BODY']))
		$GLOBALS['BODY'] = "<body>";

	if(!isset($GLOBALS['PIED']))
		$GLOBALS['PIED'] = '</body></html>';
	
	if(!isset($GLOBALS['NBR_CHAR_MAX_NOM']))	$GLOBALS['NBR_CHAR_MAX_NOM']=20;
	if(!isset($GLOBALS['NBR_CHAR_MAX_MDP']))	$GLOBALS['NBR_CHAR_MAX_MDP']=40;
	if(!isset($GLOBALS['LONGUEUR_CHAMPS'])) 	$GLOBALS['LONGUEUR_CHAMPS']=15;
	
	if(!isset($GLOBALS['BDD_CONNECTEE']))	$GLOBALS['BDD_CONNECTEE'] = false;
?>
