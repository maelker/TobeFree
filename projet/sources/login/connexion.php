<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>Inscription</title>
		<link href="sources/styleMain.css" rel="stylesheet" type="text/css"/>

    <script type='text/javascript' src='verif.js'></script>
	</head>
	<body>
		<div>
			<a href="./accueil">
				<img src="sources/images/logo.jpg"><h1>Nom site</h1>
			</a>
		</div>
		<div class="menu">
			<nav>
				<ul>
					<li><a href="./inscription">inscription</a></li>
					<li><a href="./critere">Recherche de pathologie par critère</a></li>
					<li><a href="./symptome">Recherche de pathologie par symptome</a></li>
					<li><a href="./information">Informations</a></li>
					<li><a href="./connexion">Connexion</a></li>
				</ul>
			</nav>
		</div>
		<div class="corps">
			
			<div class="column" style="background-color:#bbb;">
			<h2>Titre 2</h2>
					<form action="">Login<br>
					<input type="text" id= "pseudo" name="pseudo">
					<br>Password<br>
					<input type="password" id ="pass" name="pass">
					<input type="submit" value="Connexion">
					</form></div>
		</div>
	</body>
	
	
	




<?php 

//On récupère le mail et de mot de passe du formulaire
$pseudo = filter_input(INPUT_POST, 'pseudo');
$pass = filter_input(INPUT_POST, 'pass');

 
	
$pseudo = trim($pseudo) != '' ? $pseudo : null;
$pass = trim($pass) != '' ? $pass : null;
	
try{
	$connexion = new PDO('mysql: host=localhost;dbname = acuBD; charset = utf8','root','root');
}
catch(Exeption $e){
	die('Erreur : ' .$e->getMessage()) or die(print_r($connexion->errorInfo()));
}

$req = $connexion->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array('pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base

$pass_hach = password_hash($_POST['pass'], PASSWORD_DEFAULT);

if ($pass_hach != $resultat[0])
{
		echo 'Mauvais identifiant ou mot de passe !';
}
else
{
	session_start();
	$_SESSION['id'] = $resultat['id'];
	$_SESSION['pseudo'] = $pseudo;
	echo 'Vous êtes connecté !';
}


?>


</html>
