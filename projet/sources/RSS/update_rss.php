
<?php
 


//On déclare la fonction Php :
function update_fluxRSS() {
 
/*  Nous allons générer notre fichier XML d'un seul coup. Pour cela, nous allons stocker tout notre
  fichier dans une variable php : $xml.
  On commence par déclarer le fichier XML puis la version du flux RSS 2.0.
  Puis, on ajoute les éléments d'information sur le channel. Notez que nous avons volontairement
  omit quelques balises :
*/
$xml = '<?xml version="1.0" encoding="iso-8859-1"?><rss version="2.0">';
$xml .= '<channel>'; 
$xml .= '<title>Flux RSS du site acupuncture</title>';
$xml .= '<link>localhost/projet/</link>';
$xml .= '<description>Description du channel</description>';


 
/*  Maintenant, nous allons nous connecter à notre base de données afin d'aller chercher les
  items à insérer dans le flux RSS.
*/

try{
	$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 
 // selection des 5 dernieres news
$reponse =$connexion->prepare("SELECT * FROM news");
$reponse->bindParam('titre', $titre, PDO::PARAM_INT);
$reponse->bindParam('description', $titre, PDO::PARAM_INT);

$reponse->execute();


// extraction des informations et ajout au contenu
while($donnees=$reponse->fetch()){   
	$titre=$donnees['titre'];
    $description=$donnees['description'];

	//$description=$donnees[description];
	//$date2=date("D, d M Y H:i:s", strtotime($date));
 
	$xml .= '<item>';
	$xml .= '<title>'.$titre.'</title>';
	$xml .= '<description>'.$description.'</description>';
  $xml .= '<pubDate>'.(date("D, d M Y H:i:s O", strtotime($donnees['creation']))).'</pubDate>'; 
	$xml .= '</item>';	
}
			
//Puis on termine la requête
$reponse->closeCursor();
 
//Et on ferme le channel et le flux RSS.
$xml .= '</channel>';
$xml .= '</rss>';
 
/*  Tout notre fichier RSS est maintenant contenu dans la variable $xml.
  Nous allons maintenant l'écrire dans notre fichier XML et ainsi mettre à jour notre flux.
  Pour cela, nous allons utiliser les fonctions de php File pour écrire dans le fichier.
 
  Notez que l'adresse URL du fichier doit être relative obligatoirement !
*/
 
//On ouvre le fichier en mode écriture
$fp = fopen("rss.xml", 'w+');
 
//On écrit notre flux RSS
fputs($fp, $xml);
 
//Puis on referme le fichier
fclose($fp);
 
} //Fermeture de la fonction
?>





