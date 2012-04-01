<?php
	$PAGE_PAR_DEFAUT = "accueil.php";
	
	if(!isset($DOCTYPE))
		$DOCTYPE =
			'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">';

	if(!isset($TITLE))
		$TITLE = '';

	if(!isset($HEAD))
		$HEAD =
				'<head>
					<title>'.$TITLE.'</title>
					<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				</head>';

	if(!isset($BODY))
		$BODY = "<body>";

	if(!isset($PIED))
		$PIED = '</body></html>';
	
	if(!isset($NBR_CHAR_MAX_NOM))			$NBR_CHAR_MAX_NOM=20;
	if(!isset($NBR_CHAR_MAX_MDP))			$NBR_CHAR_MAX_MDP=40;
	if(!isset($LONGUEUR_CHAMPS)) 			$LONGUEUR_CHAMPS=15;
?>
