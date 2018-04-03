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
//require("lib/smarty/Smarty.class.php");
$tpl = new Smarty();
$tpl->compile_dir = 'templates_c/';

//assignation et affichage de la liste de critère
$tpl->assign('list_meridien', $list_meridien);
$tpl->assign('list_type', $list_type);
$tpl->assign('list_carac', $list_carac);

$tpl->display("sources/critere/critere.html");



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
	
	//requete de recuperation des pathologie à partire des critères cochés
	$i = 0;
	$list_patho = array();
	if(count($meridien_coche)!=0 && count($type_coche)!=0 && count($caract_coche)!=0)
	{
		for ($j=0; $j < count($meridien_coche); $j++) { 
			for ($k=0; $k < count($type_coche); $k++) { 
				for ($l=0; $l < count($caract_coche); $l++) { 
					$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( meridien.nom='$meridien_coche[$j]'  OR pathoType.carac='$caract_coche[$l]' OR pathoType.type='$type_coche[$k]') ");
					$query5->execute();
					while($data5 = $query5->fetch()){
					    $list_patho[$i]['desc'] = $data5['desc'];
						$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
					    $i++;
					}
					$query5->closeCursor();
				}
			}
		}
	}
	elseif (count($meridien_coche)!=0 && count($type_coche)!=0 && count($caract_coche)==0) {
		for ($j=0; $j < count($meridien_coche); $j++) { 
			for ($k=0; $k < count($type_coche); $k++) { 
				$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( meridien.nom='$meridien_coche[$j]'  OR pathoType.type='$type_coche[$k]') ");
				$query5->execute();
				while($data5 = $query5->fetch()){
				    $list_patho[$i]['desc'] = $data5['desc'];
					$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
				    $i++;
				}
				$query5->closeCursor();
			}
		}
	}
	elseif(count($meridien_coche)!=0 && count($type_coche)==0 && count($caract_coche)!=0)
	{
		for ($j=0; $j < count($meridien_coche); $j++) {  
			for ($l=0; $l < count($caract_coche); $l++) { 
				$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( meridien.nom='$meridien_coche[$j]'  OR pathoType.carac='$caract_coche[$l]' ) ");
				$query5->execute();
				while($data5 = $query5->fetch()){
				    $list_patho[$i]['desc'] = $data5['desc'];
					$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
				    $i++;
				}
				$query5->closeCursor();
			}
		}
	}
	elseif(count($meridien_coche)==0 && count($type_coche)!=0 && count($caract_coche)!=0)
	{ 
		for ($k=0; $k < count($type_coche); $k++) { 
			for ($l=0; $l < count($caract_coche); $l++) { 
				$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( pathoType.carac='$caract_coche[$l]' OR pathoType.type='$type_coche[$k]') ");
				$query5->execute();
				while($data5 = $query5->fetch()){
				    $list_patho[$i]['desc'] = $data5['desc'];
					$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
				    $i++;
				}
				$query5->closeCursor();
			}
		}
	}
	elseif(count($meridien_coche)==0 && count($type_coche)==0 && count($caract_coche)!=0)
	{  
		for ($l=0; $l < count($caract_coche); $l++) { 
			$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( pathoType.carac='$caract_coche[$l]' ) ");
			$query5->execute();
			while($data5 = $query5->fetch()){
			    $list_patho[$i]['desc'] = $data5['desc'];
				$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
			    $i++;
			}
			$query5->closeCursor();
		}
	}
	elseif(count($meridien_coche)==0 && count($type_coche)!=0 && count($caract_coche)==0)
	{ 
		for ($k=0; $k < count($type_coche); $k++) { 
			$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( pathoType.type='$type_coche[$k]') ");
			$query5->execute();
			while($data5 = $query5->fetch()){
			    $list_patho[$i]['desc'] = $data5['desc'];
				$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
			    $i++;
			}
			$query5->closeCursor();
		}
	}
	elseif(count($meridien_coche)!=0 && count($type_coche)==0 && count($caract_coche)==0)
	{
		for ($j=0; $j < count($meridien_coche); $j++) {  
			$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,meridien,pathoType WHERE patho.mer=meridien.code AND pathoType.codeType=patho.type AND( meridien.nom='$meridien_coche[$j]' ) ");
			$query5->execute();
			while($data5 = $query5->fetch()){
			    $list_patho[$i]['desc'] = $data5['desc'];
				$list_patho[$i]['under']=str_replace(' ','_',$data5['desc']);
			    $i++;
			}
			$query5->closeCursor();
		}
	}

	//assignation et affichage des pathologies trouvées
	$tpl->assign('list_patho', $list_patho);
	$tpl->display("sources/critere/resultat.html");
}

?>