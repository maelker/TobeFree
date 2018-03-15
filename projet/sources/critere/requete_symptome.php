<?php

//connexion à la bdd pour les requetes
try{
	$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//recupération de tous les méridiens
$query1 = $connexion->prepare("SELECT nom FROM meridien ");
$query1->execute();
$list_meridien = array();
$i = 0;
while($data = $query1->fetch()){
    $list_meridien[$i]['nom'] = $data['nom'];
    $i++;
}
$query1->closeCursor();

//recupération de tous les types
$query2 = $connexion->prepare("SELECT DISTINCT type FROM pathoType");
$query2->execute();
$list_type = array();
$i = 0;
while($data2 = $query2->fetch()){
    $list_type[$i]['type'] = $data2['type'];
    $i++;
}
$query2->closeCursor();

//recupération de toutes les caractéristiques
$query3 = $connexion->prepare("SELECT DISTINCT carac FROM pathoType WHERE carac !=''");
$query3->execute();
$list_carac = array();
$i = 0;
while($data3 = $query3->fetch()){
    $list_carac[$i]['carac'] = $data3['carac'];
    $i++;
}
$query3->closeCursor();


// On lance et configure Smarty
require("../../lib/smarty/Smarty.class.php");
$tpl = new Smarty();
$tpl->compile_dir = '../../templates_c/';

//assignation et affichage de la liste de critère
$tpl->assign('list_meridien', $list_meridien);
$tpl->assign('list_type', $list_type);
$tpl->assign('list_carac', $list_carac);

$tpl->display("critere.html");



//traitement pour le formulaire de critère
if ( isset($_POST['valider']) )
{
	$meridien_coche = array();
	$type_coche=array();
	$caract_coche=array();
	$i = 0;
	$j=0;

	//recuperation de la liste de méridien coché
	for ($i=0; $i < count($list_meridien); $i++) { 
		if(isset($_POST[str_replace(' ','_',$list_meridien[$i]['nom'])]) && $_POST[str_replace(' ','_',$list_meridien[$i]['nom'])]=='on') 
		{
			$meridien_coche[$j]=$list_meridien[$i]['nom'];
			$j++;
		}
	}
	$tpl->assign('list_meridienCoche', $meridien_coche);

	//recuperation de la liste de type coché
	$j=0;
	for ($i=0; $i <count($list_type) ; $i++) { 
		if(isset($_POST[str_replace(' ','_',$list_type[$i]['type'])]) && $_POST[str_replace(' ','_',$list_type[$i]['type'])]=='on')
		{
			$type_coche[$j]=$list_type[$i]['type'];
			$j++;
		}
	}
	$tpl->assign('list_typeCoche', $type_coche);

	//recuperation de la liste de caractéristique cochée
	$j=0;
	for ($i=0; $i <count($list_carac) ; $i++) { 
		if(isset($_POST[str_replace(' ','_',$list_carac[$i]['carac'])]) && $_POST[str_replace(' ','_',$list_carac[$i]['carac'])]=='on')
		{
			$caract_coche[$j]=$list_carac[$i]['carac'];
			$j++;
		}
	}
	$tpl->assign('list_caractCoche', $caract_coche);
	
	//recupération des idMeridien pour les meridiens dans la bdd
	$i = 0;
	$list_meridienId = array();
	for ($j=0; $j < count($meridien_coche); $j++) { 
		if (isset($meridien_coche[$j])){
			$query4 = $connexion->prepare("SELECT code FROM meridien WHERE nom='$meridien_coche[$j]'");
			$query4->execute();
			while($data4 = $query4->fetch()){
			    $list_meridienId[$i] = $data4['code'];
			    $i++;
			}
			$query4->closeCursor();
		}
	}

	//recuperation des idType pour les types dans la bdd
	$i = 0;
	$list_typeId = array();
	for ($j=0; $j < count($type_coche); $j++) { 
		if (isset($type_coche[$j])){
			$query4 = $connexion->prepare("SELECT codeType FROM `pathoType` WHERE type='$type_coche[$j]'");
			$query4->execute();
			while($data4 = $query4->fetch()){
			    $list_typeId[$i] = $data4['codeType'];
			    $i++;
			}
			$query4->closeCursor();
		}
	}

	//recuperation des idCaract pour les caractéristiques dans la bdd
	$i = 0;
	$list_caractId = array();
	for ($j=0; $j < count($caract_coche); $j++) { 
		if (isset($caract_coche[$j])){
			$query4 = $connexion->prepare("SELECT codeType FROM `pathoType` WHERE carac='$caract_coche[$j]'");
			$query4->execute();
			while($data4 = $query4->fetch()){
			    $list_caractId[$i] = $data4['codeType'];
			    $i++;
			}
			$query4->closeCursor();
		}
	}

	//recuperation des pathologie à partir des idType dans la bdd	
	$i = 0;
	$list_patho = array();
	for ($j=0; $j < count($list_typeId); $j++) { 
		$query5 = $connexion->prepare("SELECT patho.desc FROM `patho` WHERE type='$list_typeId[$j]'");
		$query5->execute();
		while($data5 = $query5->fetch()){
		    $list_patho[$i]['desc'] = $data5['desc'];
		    $i++;
		}
		$query5->closeCursor();
	}
	
	//recuperation des pathologie à partir des idMeridien dans la bdd
	for ($j=0; $j < count($list_meridienId); $j++) { 
		$query5 = $connexion->prepare("SELECT patho.desc FROM `patho` WHERE mer='$list_meridienId[$j]'");
		$query5->execute();
		while($data5 = $query5->fetch()){
		    $list_patho[$i]['desc'] = $data5['desc'];
		    $i++;
		}
		$query5->closeCursor();
	}	

	//recuperation des pathologie à partir des idCaract dans la bdd
	for ($j=0; $j < count($list_caractId); $j++) { 
		$query5 = $connexion->prepare("SELECT patho.desc FROM `patho` WHERE type='$list_caractId[$j]'");
		$query5->execute();
		while($data5 = $query5->fetch()){
		    $list_patho[$i]['desc'] = $data5['desc'];
		    $i++;
		}
		$query5->closeCursor();
	}

	//assignation et affichage des pathologies trouvées
	$tpl->assign('list_patho', $list_patho);
	$tpl->display("resultat.html");
}

?>