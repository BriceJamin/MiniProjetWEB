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
		$base="bdd_ent";
		$server="localhost";
		$user="user_ent";
		$password="mdp_ent";
		
		$id=@mysql_connect($server, $user, $password)
			or die('Echec de connexion au serveur : '.mysql_error());
		@mysql_select_db($base)
			or die('Echec de connexion à la base : '.mysql_error());
	}
	
	function identifiantsCorrects($pseudo, $mdp)
	{
		// Securisation des champs pour eviter qu'ils soient exploités (injection SQL)
		$pseudo = securiser($pseudo);
		$mdp 	= securiser($mdp);
		
		// Cryptage du mdp car dans la bdd ils sont cryptés
		$mdp = SHA1($mdp);
		
		// On se connecte à la BDD pour les requêtes à venir
		connexionBdd();
		
		// Preparation de la requete
		$requete='SELECT pseudo, mdp 
			FROM compte 
			WHERE pseudo LIKE "'.$pseudo.'" AND mdp LIKE "'.$mdp.'"';
		
		// Execution de la requete		
		$result=mysql_query($requete)
			or die("Erreur de requete à la base de donnée : ".mysql_error());
		
		// Lecture
		$reponse = mysql_fetch_row($result);
		
		
		// si ce (n'est pas vide), c'est que le couple (pseudo,mdp) a été trouvé => return true
		return !empty($reponse); 
	}
?>