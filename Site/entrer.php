<?php
/*
	Page recevant les identifiants de connexion (nom et mdp) 
	Elle les vérifie et redirige le client vers une page de bienvenue ou d'erreur
*/
	
	if(isset($_POST['nom']) && isset($_POST['mdp']))
	{
		$nom = securiser($_POST['nom']);
		$mdp = securiser($_POST['mdp']);
		
		$login = new Login($nom, $mdp);
		
		if($login->existe())
		{
			session_start();
			$_SESSION['connecte'] = true;
			
			// Redirection vers actions avec message de bienvenue
			header('Location:actions.php?msg=1');
		}
		else
			// Redirection vers accueil avec message identifiants incorrects
			header('Location:accueil.php?msg=2');
	}
	else
		/*  
			Le formulaire reçu est incorrect
			Redirection vers page d'accueil avec message donnees reçues invalides.
		*/
		header('Location:accueil.php?msg=3');
?>