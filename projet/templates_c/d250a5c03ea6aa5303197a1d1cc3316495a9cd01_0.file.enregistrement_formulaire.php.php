<?php
/* Smarty version 3.1.30, created on 2018-02-27 10:41:30
  from "C:\Program Files\EasyPHP-Devserver-17\eds-www\TLI\enregistrement_formulaire.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9527ca47be90_65391323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd250a5c03ea6aa5303197a1d1cc3316495a9cd01' => 
    array (
      0 => 'C:\\Program Files\\EasyPHP-Devserver-17\\eds-www\\TLI\\enregistrement_formulaire.php',
      1 => 1519327581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9527ca47be90_65391323 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 

';?>session_start(); // on ouvre une session

$motdepasse =$_POST['mdpclient']; // stockage du mot de passe client
$motdepasse2 = $_POST['mdpclient_repeat'];

	if($motdepasse == $motdepasse2)
		{
			$nom = $_POST['nom'];
			$Prénom	= $_POST['Prénom'];
			$adresse_mail	= $_POST['email_addr'];			
			$motdepasse_hache = md5($motdepasse); // Cryptage du mot de passe en md5 
			
			// met dans la base de donnée les informations suivantes : Nom, prénom, adresse mail et mot de passe mais je ne sais pas si le db marche aha en mode inchalla
			$req = $db->prepare('INSERT INTO clients (Nom, Prénom, Adresse_mail, Mot_de_passe) VALUES(:Nom,:Prénom,:Adresse_mail,:Mot_de_passe);');
			
			$req->bindParam(':Nom',$nom); // binParam retourne true en cas de succès, ici si Nom est bien égale à nom c'est true et pareil pour les suivant.
			$req->bindParam(':Prénom',$Prénom);
			$req->bindParam(':Adresse_mail',$adresse_mail);
			$req->bindParam(':Mot_de_passe',$motdepasse_hache);
			$etat_inscription = true;
			$_SESSION['etat_connexion'] = true;
			$message = '<p Heureuse joie à vous ! vous faites maintenant partie de TobeFree!</p>
					<p>Cliquez <a href="./index.php">ici</a> Si vous voulez revenir à la page d accueil</p>';
		}
	else
		{
			$etat_inscription = false;
			$message = '<p>Une erreur est survenue !!!! pas de chance <br /> 
				Votre mot de pas ou votre identifiant est incorecte veuillez recommencer</p>
				<!-- <p>Cliquez <a href="./Formulaire_connexion.html">ici</a> Page précédente-->
				<br /><br />Cliquez <a href="./index.php">ici</a> page daccueil</p>';
				echo "Bye bye Bébé";
		}
		
echo $message;
<?php echo '?>';?>

<?php }
}
