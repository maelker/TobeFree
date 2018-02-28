<?php 


//On récupère le mail et de mot de passe du formulaire
$adresse_mail = $_POST['email_addr'];
$mot_de_passe = $_POST['mdp'];




$resultat[0] = 'motdepasse'; // Il faudrait récupérer le mot de passe dans la base de donnée avec peut être un query mais la je sèche ^^ 
// Protection des mots de passe avec md5 (hachage)
$mot_de_passe_hache = md5($mot_de_passe);


//On vérifie si les mot de passe sont bien les mêmes
if($mot_de_passe_hache == $resultat[0]){
	
	$_SESSION['etat_connexion'] = true;
	echo "La Connexion est  "; // normalement true
	echo $_SESSION['etat_connexion'];

}
else{
	
	$_SESSION['etat_connexion'] = false;
	
}

//Peut être mettre un message si c'est bon ou pas 
?>
