
<?php 
//nouvelle instance de Smarty
$tpl = new Smarty();
$tpl->compile_dir='templates_c/';

//session_start();
if(isset($_SESSION['pseudo'],$_SESSION['id'])){
	//affichage de la deconnexion
	$tpl->display("sources/login/deconnexion.html");
}
else{
	//affichage du formulaire de connexion
	$tpl->display("sources/login/connexion.html");
}

//recupération des données du formulaire
if (isset($_POST['pseudo']) && isset($_POST['pass'])){
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['pass'];

	$pseudo = trim($pseudo) != '' ? $pseudo : null;
	$pass = trim($pass) != '' ? $pass : null;
      
    //connexion à la bdd  
    $connexion = null;
	try{
		$connexion = new PDO('mysql:host=localhost;dbname=acuBD', 'root','root');
	}
	catch(Exeption $e){
		die('Erreur : ' .$e->getMessage()) or die(print_r($connexion->errorInfo()));
	}
      
    //requete pour verifier le mdp et l'utilisateur  
	$req = $connexion->prepare("SELECT `id`,`pass` FROM `membres` WHERE `pseudo` = '$pseudo'");
	$req->execute(array('pseudo' => $pseudo));
	
	$i =0;
	while($data = $req->fetch()){
		$resultat[$i]['id'] = $data['id'];
		$resultat[$i]['pass'] = $data['pass'];
		$i++;
	}

	//Comparaison du pass envoyé via le formulaire avec la base
	if(isset($resultat)){
		if ($pass == $resultat[0]["pass"]) {
			//initialisation de la session
			//session_start();
			$_SESSION['id'] = $resultat[0]['id'];
			$_SESSION['pseudo'] = $pseudo;
			setcookie($pseudo, $pass, time() + 365*24*3600, null, null, false, true);
			echo "<script>alert('Vous êtes connecté !');window.location.replace(\"..\");</script>";
		}
		else {
			echo "<script>alert('Erreur de nom d\'utilisateur ou de mot de passe !')</script>";
		}
	}
	else {
			echo "<script>alert('Erreur de nom d\'utilisateur ou de mot de passe !')</script>";
	}
		

}
?>



