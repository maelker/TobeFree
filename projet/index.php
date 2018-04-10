<?php

//mon index.php se trouve dans projet
require("lib/smarty/Smarty.class.php"); // On inclut la classe Smarty
$smarty = new Smarty();

session_start();
if(isset($_SESSION['pseudo'],$_SESSION['id'])){
	$smarty->assign('pseudo', $_SESSION['pseudo']);
	$smarty->assign('login', "Déconnexion");
}
else
{
	$smarty->assign('login', "Connexion");

}

$url = '';
if(isset($_GET['url'])) {
    $url = explode('/',$_GET['url']);
}
// var_dump($url);   //DEBUG

if($url == '') {
	$smarty->display("sources/menuglobal.html");
	require 'sources/accueil/page_accueil.html';	

} elseif($url[0]=='accueil') {
	$smarty->display("sources/menuglobal.html");
	$smarty->display("sources/accueil/page_accueil.html");	
} elseif($url[0]=='critere') {
	$smarty->display("sources/menuglobal.html");
	require "sources/critere/requete_symptome.php";	
} elseif($url[0]=='inscription') {
	$smarty->display("sources/menuglobal.html");
	require 'sources/inscription/inscription.php';  //url=localhost/projet/inscription	
} elseif($url[0]=='symptome') {
	$smarty->display("sources/menuglobal.html");
	require "sources/symptome/requete_motcle.php";
} elseif($url[0]=='pathologie') {
		if (isset($url[1]) && $url[1]!="") {
			$patho=$url[1];
			require "sources/pathologie/pathologie.php";
		}	
} elseif($url[0]=='information') {
	$smarty->display("sources/menuglobal.html");
	$smarty->display("sources/info/information.html");
} elseif($url[0]=='connexion') {
	$smarty->display("sources/menuglobal.html");
	require 'sources/login/connexion.php';  //url=localhost/projet/connexion	
}
elseif($url[0]=='RSS') {
	$smarty->display("sources/menuglobal.html");
	require 'sources/RSS/rss.xml'; 	
}elseif($url[0]=='deconnexion') {
	$smarty->display("sources/menuglobal.html");
	require 'sources/login/deconnexion.php'; 	
}


?>
