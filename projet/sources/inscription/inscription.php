
<?php

$tpl = new Smarty();
$tpl->compile_dir='templates_c/';

$pseudo = filter_input(INPUT_POST, 'pseudo');
$pass = filter_input(INPUT_POST, 'passe');
$pass2 = filter_input(INPUT_POST, 'passe2');
$email=filter_input(INPUT_POST, 'email');
$erreur = "";

/* Si le formulaire est envoyé */
if (isset($pseudo,$pass,$email,$pass2)) 
{   

	/* Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces  */ 
	$pseudo = trim($pseudo) != '' ? $pseudo : null;
	$pass = trim($pass) != '' ? $pass : null;
	$email = trim($email) != '' ? $email : null;


	/* Si $pseudo et $pass différents de null */
	if(!isset($pseudo,$pass,$pass2,$email)) 
	{
		function verif_email($email)
		{
			$syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
			if(preg_match($syntaxe,$email))
				return true;
			else
				return false;
		}   

		if ($_POST['passe'] != $_POST['passe2']) {                         /*verif email et mot de passe*/
			$erreur = 'Les 2 mots de passe sont différents.';
		}

		if (!verif_email($_POST['email'])) {
			$erreur= 'Votre email n\'est pas valide.' . '<br />';
		}
	}	
	elseif($erreur=="")
	{
		/* Connexion au serveur : dans cet exemple, en local sur le serveur d'évaluation
		A MODIFIER avec vos valeurs */
		$hostname = "localhost";
		$database = "acuBD";
		$username = "root";
		$password = "root";
		
		/* Configuration des options de connexion */
		
		/* Désactive l'éumlateur de requêtes préparées (hautement recommandé)  */
		$pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
		
		/* Active le mode exception */
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		
		/* Indique le charset */
		$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
		
		/* Connexion */
		try
		{
			$connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, $pdo_options);
		}
		catch (PDOException $e)
		{
			exit('problème de connexion à la base');
		}
		
		
		/* Requête pour compter le nombre d'enregistrements répondant à la clause : champ du pseudo de la table = pseudo posté dans le formulaire */
		$requete = "SELECT count(*) FROM membres WHERE pseudo = ?";
		
		try
		{
			/* préparation de la requête*/
			$req_prep = $connect->prepare($requete);
			
			/* Exécution de la requête en passant la position du marqueur et sa variable associée dans un tableau*/
			$req_prep->execute(array(0=>$pseudo));
			
			/* Récupération du résultat */
			$resultat = $req_prep->fetchColumn();
			
			if ($resultat == 0) 
			/* Résultat du comptage = 0 pour ce pseudo, on peut donc l'enregistrer */
			{
									
				/* Pour enregistrer la date actuelle (date/heure/minutes/secondes) on peut utiliser directement la fonction mysql : NOW()*/
				$insertion = "INSERT INTO membres(pseudo,pass,email,date_enregistrement) VALUES(:nom, :password,:email, NOW())";
				
				
				/* préparation de l'insertion */
				$insert_prep = $connect->prepare($insertion);
				
				/* Exécution de la requête en passant les marqueurs et leur variables associées dans un tableau*/
				$inser_exec = $insert_prep->execute(array(':nom'=>$pseudo,':password'=>$pass,':email'=>$email));
				
				/* Si l'insertion s'est faite correctement...*/
				if ($inser_exec === true) 
				{
					/* Démarre une session si aucune n'est déjà existante et enregistre le pseudo dans la variable de session $_SESSION['login'] qui donne au visiteur la possibilité de se connecter.  */
					if (!session_id()) session_start();
					$_SESSION['login'] = $pseudo;
					
					/* A MODIFIER Remplacer le '#' par l'adresse de votre page de destination, sinon ce lien indique la page actuelle.*/
					$erreur = "<script>alert('Votre inscription est enregistrée.');window.location.replace(\"../connexion\");</script>";
					/*ou redirection vers une page en cas de succès ex : menu.php*/
					/*header("Location: menu.php");
						exit();  */
				}   
			}
			else
			{   /* Le pseudo est déjà utilisé */
				$erreur = 'Ce pseudo est déjà utilisé, changez-le.';
			}
		}
		catch (PDOException $e)
		{
			$erreur = 'Problème dans la requête d\'insertion';
		}	
	}

	else 
	{    /* Au moins un des deux champs "pseudo" ou "mot de passe" n'a pas été rempli*/
		$erreur = 'Les champs Pseudo et Mot de passe doivent être remplis.';
	}
}

if(isset($erreur))
		$tpl->assign('erreur', $erreur);

$tpl->display("sources/inscription/inscription.html");

?>


