<?php

//mon index.php se trouve dans projet
require("lib/smarty/Smarty.class.php"); // On inclut la classe Smarty
$smarty = new Smarty();
// var_dump($_GET);   //DEBUG

$url = '';
if(isset($_GET['url'])) {
    $url = explode('/',$_GET['url']);
}
// var_dump($url);   //DEBUG

if($url == '') {
	require 'sources/accueil/page_accueil.html';	
} elseif($url[0]=='accueil') {
		$smarty->display("sources/accueil/page_accueil.html");	
} elseif($url[0]=='critere') {
		require "sources/critere/requete_symptome.php";	
} elseif($url[0]=='inscription') {
		require 'sources/inscription/inscription.php';  //url=localhost/projet/inscription	
} elseif($url[0]=='symptome') {
		require "sources/symptome/requete_motcle.php";
} elseif($url[0]=='pathologie') {
		if (isset($url[1]) && $url[1]!="") {
			$patho=$url[1];
			require "sources/pathologie/pathologie.php";
		}	
} elseif($url[0]=='information') {
		$smarty->display("sources/info/information.html");
} elseif($url[0]=='connexion') {
		require 'sources/login/connexion.php';  //url=localhost/projet/connexion	
}

?>