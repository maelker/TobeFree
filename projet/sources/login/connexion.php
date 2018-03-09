<?php 

//On récupère le mail et de mot de passe du formulaire
$pseudo = filter_input(INPUT_POST, 'pseudo');
$pass = filter_input(INPUT_POST, 'pass');


if (isset($pseudo,$pass)) 
{  
	
	$pseudo = trim($pseudo) != '' ? $pseudo : null;
	$pass = trim($pass) != '' ? $pass : null;
	
	try{ $connexion = new PDO('mysql: host=localhost;dbname = acuBD; charset = utf8','root','root'); }
	catch (Exeption $e) { die('Erreur : ' .$e->getMessage()) or die(print_r($connexion->errorInfo())); }
	$req = $connexion->query("SELECT * FROM membres WHERE pseudo='$pseudo' AND passe='$pass'");
	try{
		$req_prep = $connexion->prepare($req);
		$req->execute(array($pseudo, $passe));
		$resultat = $req_prep->fetchColumn();

		if ($resultat != 0)
		{
		console.log( "resultat=0");
		}
	}
	// Il faudrait récupérer le mot de passe dans la base de donnée avec peut être un query mais la je sèche ^^ 
	// Protection des mots de passe avec md5 (hachage)



	//$mot_de_passe_hache = md5($mot_de_passe);


	//On vérifie si les mot de passe sont bien les mêmes
// 	if($mot_de_passe == $resultat[0]){
// 		
// 		echo $resultat[0];
// 		$_SESSION['etat_connexion'] = true;
// 		echo "La Connexion est  "; // normalement true
// 		echo $_SESSION['etat_connexion'];
// 
// 	}
// 	else{
// 		
// 		$_SESSION['etat_connexion'] = false;
// 		
// 	}
// }
//Peut être mettre un message si c'est bon ou pas 
?>

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
				</ul>
			</nav>
		</div>
		<div class="corps">
			
			<div class="column" style="background-color:#bbb;">
			<h2>Titre 2</h2>
					<form action="">Login<br>
					<input type="text" id= "pseudo" name="userid">
					<br>Password<br>
					<input type="password" id ="pass" name="psw">
					<input type="submit" value="Connexion">
					</form></div>
			<div class="column" style="background-color:#ccc;">
			<h2>Titre 3</h2>
			</div>
			
		
		</div>
	</body>
</html>

















