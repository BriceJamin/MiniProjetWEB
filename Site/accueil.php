<?php
/* 
	Cette page permet de se connecter.
	Si le client n'est pas connect� il est automatiquement redirig� ici. 
*/

$page = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Accueil</title>
	</head>
	<body>
		<h1>Accueil</h1>
		<p>Connectez vous :</p>
		<form method="POST" action="entrer.php">
			Nom :<input type="text" name="nom" />
			Mot de passe :<input type="password" name="mdp" />
			<input type="button" value="Se connecter" />
		</form>
	</body>
</html>';

?>
