<?php
	/*
		Contient des fonctions qui peuvent s'av�rer utiles
		Seront peut �tre incluses ailleurs ou int�gr�es dans des classes... A voir
	*/
	function __autoload($className)
	{
		include 'class_'.$className.'.php';
	}
	
	function securiser($aSecuriser)
	{
		if(!empty($aSecuriser))
			$aSecuriser = mysql_real_escape_string(htmlspecialchars($aSecuriser))
					or die("error : mysql_real_escape_string. Retourne $aSecuriser".mysql_error());
		
		return $aSecuriser;
	}
	
	function getMessageInfoSession()
	{
		if(isset($_SESSION['messageInfo']))
		{
			$messageInfoSession = $_SESSION['messageInfo'];
			
			// La variable a jou� son role, on peut maintenant la detruire
			unset($_SESSION['messageInfo']);
		}
		else
			$messageInfoSession = "";
			
		return $messageInfoSession;
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
			or die('Echec de connexion � la base : '.mysql_error());
	}
	
	function identifiantsCorrects($nom, $mdp)
	{
		// Securisation des champs pour eviter qu'ils soient exploit�s (injection SQL)
		$nom = securiser($nom);
		$mdp 	= securiser($mdp);
		
		// Cryptage du mdp car dans la bdd ils sont crypt�s
		$mdp = SHA1($mdp);
		
		// On se connecte � la BDD pour les requ�tes � venir
		connexionBdd();
		
		// Preparation de la requete
		$requete='SELECT nom, mdp 
			FROM compte 
			WHERE nom LIKE "'.$nom.'" AND mdp LIKE "'.$mdp.'"';
		
		// Execution de la requete		
		$result=mysql_query($requete)
			or die("Erreur de requete � la base de donn�e : ".mysql_error());
		
		// Lecture
		$reponse = mysql_fetch_row($result);
		
		
		// si ce (n'est pas vide), c'est que le couple (nom,mdp) a �t� trouv� => return true
		return !empty($reponse); 
	}
?>