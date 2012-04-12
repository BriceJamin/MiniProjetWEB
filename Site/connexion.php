<?php
	/*
		Page qui permet à l'utilisateur de rentrer ses identifiants et de se connecter
		Elle est invisible pour un utilisateur déjà connecté (redirection automatique)
		Elle vérifie la casse des identifiants, et leur correspondance avec un compte existant
		Elle stocke en conséquance un message d'info dans $_SESSION['messageInfo']
		Si les identifiants sont bons elle crée la variable $_SESSION['estConnecte'] et redirige vers $PAGE_PAR_DEFAUT
	*/

	/*
		$HEAD (variable globale) utilise les variables $TITLE et $STYLE
		Si on ne les crée pas, elles seront vides
		Comme on souhaite que la page ait un titre, on l'initialise avant l'inclusion
			des variales globales.
	*/
	$TITLE = "Connexion";

	// Inclusion des variables globales APRES initialisation des variables globales
	include("variablesGlobales.php");
	
	// Inclusion du fichiers contenant toutes les fonctions
	include('fonctions.php');
	
	// Ouverture d'une session pour savoir si la personne est connectée ou non
	session_start();
	
	// Recuperation dans la session d'un eventuel message à afficher
	$messageInfoSession = getMessageInfoSession();
	
	// Si l'utilisateur est déjà connecté, on le redirige vers la page par défaut
	if(isset($_SESSION['estConnecte']))
	{
		$_SESSION['messageInfo'] = "
			<p>
				Vous ne pouvez pas vous connecter, vous l'êtes déjà !<br />
				Pour vous connecter, <a href=\"deconnexion.php\">déconnectez vous</a> d'abord.
			</p>
			<hr />";
		header('Location:'.$PAGE_PAR_DEFAUT);
		exit;
	}
	
	// Pas défaut les champs du formulaire sont vides
	$mdp	= "";
	$nom = "";
	
	// Par défaut il n'y a aucun message d'erreur de formulaire
	$msgErreurFormulaire = "";
	
	// Si le formulaire de connexion a été envoyé
	if(isset($_POST['seConnecter']))
	{
		// S'il manque au moins un champs, le formulaire n'est pas l'original
		if(!isset($_POST['nom']) || !isset($_POST['mdp']))
		{
			// Rechargement de la page
			$nomDeCettePage = basename( $_SERVER['PHP_SELF'] );
			header('Location:connexion.php');
			exit();
		}
		
		// Récupération des champs du formulaire
		$nom	= $_POST['nom'];
		$mdp	= $_POST['mdp'];

		if(		empty($nom) || empty($mdp) 		 // Un des champs est vide
			||	!identifiantsCorrects($nom, $mdp)) // Les identifiants sont incorrects
		{
			$msgErreurFormulaire="Vos identifiants sont incorrects";
			
			// Vidage du contenu de mdp, le champ sera vide
			$mdp = '';
		}
		else
		// Les identifiants sont corrects
		{
			/*
				Variable qui prouve que l'utilisateur est connecte 
				Sa valeur n'a pas d'importance, qu'elle existe est suffisant, car
					lorsque l'utilisateur est déconnecté cette variable est detruite
			*/
			$_SESSION['estConnecte'] = true;
			
// TODO : Actualiser la date de dernière visite
			actualiserLastVisite();
// TODO : Récupération des infos liées à ce compte
			$infosCompte = getInfosCompte();
			
			
// TODO : Stockage de ces infos vers $_SESSION
// TODO : Modifier le message de bienvenue par "Bienvenue [...] <prenom> <nom> !"
// TODO : Récupération de la catégorie du compte (admin ?)
// TODO : Stockage de la catégorie vers $_SESSION
// TODO : Determiner la destination de redirection en fonction de la catégorie (accueil.php, profil.php ?)
			
			// Pour afficher dans $PAGE_PAR_DEFAUT un message informant que la connexion a réussi
			$_SESSION['messageInfo'] = '
				<p> 
					Connexion effectuée avec succés.<br />
					Bienvenue sur votre espace perso '.$nom.' !
				</p>
				<hr />';
			header("Location:".$PAGE_PAR_DEFAUT);
		}
	}
	
	$titrePage = '<h1>Connexion</h1>';
	$formulaire = '
		<fieldset> <legend>Se connecter</legend>
		<form action="connexion.php" method="post" >
			<table>
				<tr>
					<td>
					</td>
					<td>
					</td>
					<td rowspan="3">
						'.$msgErreurFormulaire.'
					</td>
				</tr>
				<tr>
					<td> <label for="nom">Nom :</label> </td>
					<td> 
						<input type="text" name="nom" id="nom" size="'.$LONGUEUR_CHAMPS.'" maxlength="'.$NBR_CHAR_MAX_NOM.'" value="'.$nom.'" /> 
					</td>
				</tr>
				<tr>
					<td>
						<label for="mdp"> Mot de Passe :</label>
					</td>
					<td>
						<input type="password" name="mdp" id="mdp" size="'.$LONGUEUR_CHAMPS.'" maxlength="'.$NBR_CHAR_MAX_MDP.'" value="'.$mdp.'" />
					</td>
				</tr>
			</table>
			<p>
				<input type="submit" name="seConnecter" value="Se connecter" />
			</p>
		</form>
		</fieldset> ';
		
	$BODY .= $messageInfoSession.$titrePage.$formulaire;
	$page_html = $DOCTYPE.$HEAD.$BODY.$PIED;
	
	echo $page_html;
?>
