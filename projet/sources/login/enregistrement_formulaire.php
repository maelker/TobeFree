<?php 

session_start(); // on ouvre une session

$motdepasse =$_POST['mdpclient']; // stockage du mot de passe client
$motdepasse2 = $_POST['mdpclient_repeat'];

	if($motdepasse == $motdepasse2)
		{
			$nom = $_POST['nom'];
			$Pr�nom	= $_POST['Pr�nom'];
			$adresse_mail	= $_POST['email_addr'];			
			$motdepasse_hache = md5($motdepasse); // Cryptage du mot de passe en md5 
			
			// met dans la base de donn�e les informations suivantes : Nom, pr�nom, adresse mail et mot de passe mais je ne sais pas si le db marche aha en mode inchalla
			$req = $db->prepare('INSERT INTO clients (Nom, Pr�nom, Adresse_mail, Mot_de_passe) VALUES(:Nom,:Pr�nom,:Adresse_mail,:Mot_de_passe);');
			
			$req->bindParam(':Nom',$nom); // binParam retourne true en cas de succ�s, ici si Nom est bien �gale � nom c'est true et pareil pour les suivant.
			$req->bindParam(':Pr�nom',$Pr�nom);
			$req->bindParam(':Adresse_mail',$adresse_mail);
			$req->bindParam(':Mot_de_passe',$motdepasse_hache);
			$etat_inscription = true;
			$_SESSION['etat_connexion'] = true;
			$message = '<p Heureuse joie � vous ! vous faites maintenant partie de TobeFree!</p>
					<p>Cliquez <a href="./index.php">ici</a> Si vous voulez revenir � la page d accueil</p>';
		}
	else
		{
			$etat_inscription = false;
			$message = '<p>Une erreur est survenue !!!! pas de chance <br /> 
				Votre mot de pas ou votre identifiant est incorecte veuillez recommencer</p>
				<!-- <p>Cliquez <a href="./Formulaire_connexion.html">ici</a> Page pr�c�dente-->
				<br /><br />Cliquez <a href="./index.php">ici</a> page daccueil</p>';
				echo "Bye bye B�b�";
		}
		
echo $message;
?>

