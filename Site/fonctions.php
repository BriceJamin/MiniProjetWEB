<?php
	/*
		Contient des fonctions qui peuvent s'avérer utiles
		Seront peut être incluses ailleurs ou intégrées dans des classes... A voir
	*/
	function __autoload($className)
	{
		include 'class_'.$className.'.php';
	}
	
	function securiser($aSecuriser)
	{
		if(!empty($aSecuriser))
			$aSecuriser = mysql_real_escape_string(htmlspecialchars($parametreASecuriser))
					or die("error : mysql_real_escape_string. Retourne $aSecuriser".mysql_error());
		
		return $aSecuriser;
	}
	
	function connexionBdd()
	{
		$base="bdd_projet_php";
		$server="localhost";
		$user="user_projet_php";
		$password="brice";
		
		$id=@mysql_connect($server, $user, $password)
			or die('Echec de connexion au serveur : '.mysql_error());
		@mysql_select_db($base)
			or die('Echec de connexion à la base : '.mysql_error());
	}
?>