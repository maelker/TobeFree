<?php

// Extraction des informations

$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');


require("../../lib/smarty/Smarty.class.php");


$tpl = new Smarty();

$tpl->compile_dir='../../templates_c/';

$mot_cle_requete=array();
$mot_cle_affiche=array();
$tableau_mot=array();
//$tpl->display("symptome.html");

if (isset($_POST['keyword'])){

	$liste_mot=$_POST['keyword'];
	$tableau_mot=explode(",",$liste_mot);
	$tpl->assign('tableau_mot',$tableau_mot);
	$i = 0;
	for ($j=0;$j<count($tableau_mot);$j++)
	{
		$mot_cle_requete[$j]=$tableau_mot[$j];
		$mot_cle_affiche[$j]=$mot_cle_requete[$j];
		$query1 = $connexion->prepare("SELECT DISTINCT symptome.desc FROM symptome,keywords,keySympt WHERE keywords.idK=keySympt.idK AND keySympt.idS=symptome.idS AND keywords.name='$mot_cle_requete[$j]'");

		$query1->execute();

		

		while($data = $query1->fetch()){

		    $list_symptome[$i]['desc'] = $data['desc'];

		    $i++;

		}
		$query1->closeCursor();
		$tpl->assign('list_symptome', $list_symptome);
		$tpl->assign('mot_cle_affiche',$mot_cle_affiche);
		//$tpl->display("resultat_symptome.html");
	}
//$tpl->display("resultat_symptome.html");
}

$tpl->display("symptome.html");


?>