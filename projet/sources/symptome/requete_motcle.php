<?php

// Extraction des informations

$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');


require("../../lib/smarty/Smarty.class.php");


$tpl = new Smarty();

$tpl->compile_dir='../../templates_c/';



if (isset($_POST['keyword'])){

	$mot_cle_requete=$_POST['keyword'];
	$_POST['mot_cle']=$mot_cle_requete;

	//$mot_cle_affiche=$_POST['mot_cle'];


	$query1 = $connexion->prepare("SELECT DISTINCT symptome.desc FROM symptome,keywords,keySympt WHERE keywords.idK=keySympt.idK AND keySympt.idS=symptome.idS AND keywords.name='$mot_cle_requete'");

	$query1->execute();


	$list_symptome = array();

	$i = 0;

	while($data = $query1->fetch()){

	    $list_symptome[$i]['desc'] = $data['desc'];

	    $i++;

	}
	$query1->closeCursor();
	$tpl->assign('list_symptome', $list_symptome);
	$tpl->assign('mot_cle_affiche',$mot_cle_affiche);

}

if (isset($_POST['keyword2'])){

		$mot_cle_requete2=$_POST['keyword2'];
		$mot_cle_affiche2=$_POST['keyword2'];

	//$mot_cle_affiche2; // ou $_POST['keyword2'] si jamais on le crée
		$query2 = $connexion->prepare("SELECT DISTINCT symptome.desc FROM symptome,keywords,keySympt WHERE keywords.idK=keySympt.idK AND keySympt.idS=symptome.idS AND keywords.name='$mot_cle_requete2'");

		$query2->execute();


		$list_symptome2 = array();

		$i = 0;

		while($data2 = $query2->fetch()){

		    $list_symptome2[$i]['desc'] = $data2['desc'];

		    $i++;

		}
		$query2->closeCursor();
		$tpl->assign('list_symptome2', $list_symptome2);

		$tpl->assign('mot_cle_affiche2',$mot_cle_affiche2);
	}



$tpl->display("symptome.html");


?>