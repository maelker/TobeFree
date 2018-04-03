<!doctype html>
<html lang="fr">
	<body>
		<div class="corps">
			
			<div class="column" style="background-color:#bbb;">
			<h2>Titre 2</h2>
					<form action="" method = "post">Login<br>
					<input type="text" id= "pseudo" name="pseudo">
					<br>Password<br>
					<input type="password" id ="pass" name="pass">
					<input type="submit" value="Connexion">
					</form>
					
					<input type ="button" value ='logout' onclick="window.location.href = './deconnexion'" >
					</form></div>
		</div>
	</body>
	
	
	




<?php 

//On récupère le mail et de mot de passe du formulaire
        //$pseudo = filter_input(INPUT_GET, 'pseudo');
       // $pass = filter_input(INPUT_GET, 'pass');


if (isset($_POST['pseudo']) && isset($_POST['pass'])){


        $pseudo = $_POST['pseudo'];
        $pass = $_POST['pass'];
if (isset($pseudo,$pass)) 
{  
	
	$pseudo = trim($pseudo) != '' ? $pseudo : null;
	$pass = trim($pass) != '' ? $pass : null;
        
        $connexion = null;
	try{
		//$connexion = new PDO('mysql:host=localhost;dbname = acuBD; charset = utf8','root','root');
		$connexion = new PDO('mysql:host=localhost;dbname=acuBD', 'root','root');
	}
	catch(Exeption $e){
		die('Erreur : ' .$e->getMessage()) or die(print_r($connexion->errorInfo()));
	}
        

	$req = $connexion->prepare("SELECT `id`,`pass` FROM `membres` WHERE `pseudo` = '$pseudo'");
	$req->execute(array('pseudo' => $pseudo));
	//$resultat = $req->fetch();
	$i =0;


	while($data = $req->fetch()){

		$resultat[$i]['id'] = $data['id'];
		$resultat[$i]['pass'] = $data['pass'];
		$i++;
	}
	var_dump($resultat);



	//Comparaison du pass envoyé via le formulaire avec la base
	//$siPasswordCorrect = password_verify($pass, $resultat['pass']);
/*
	if (!$siPasswordCorrect)
	{
			echo 'Mauvais identifiant ou mot de passe !';
	}
	else
	{*/
			if ($pass == $resultat[0]["pass"]) {
					session_start();
					$_SESSION['id'] = $resultat[0]['id'];
					$_SESSION['pseudo'] = $pseudo;
					echo 'Vous êtes connecté !';
					setcookie($pseudo, $pass, time() + 365*24*3600, null, null, false, true);
			}
			else {
					echo 'Tu es une nouille!';
			}
	}
	echo $pass;
	echo $resultat[0]['pass'];
//}	

}
?>


</html>
