<?php

//GESTION PAGE SYMPTOME.HTML

// Extraction des informations

$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');


require("../../lib/smarty/Smarty.class.php");


$tpl = new Smarty();

$tpl->compile_dir='../../templates_c/';

$mot_cle_requete=array();

$tableau_mot=array();
/*$list_symptome=array();
if (!is_object($list_symptome)) {
    echo "false";
}*/
$tpl->display("symptome.html");


if (isset($_POST['keyword'])){
	
	$liste_mot=$_POST['keyword'];
	$tableau_mot=explode(",",$liste_mot);
	$tpl->assign('tableau_mot',$tableau_mot);
	$i = 0;
	$mot_cle_affiche=array();
	$list_symptome=array();

	for ($j=0;$j<count($tableau_mot);$j++)
	{
		$mot_cle_requete[$j]=$tableau_mot[$j];
		$mot_cle_affiche[$j]=$mot_cle_requete[$j];
		$query1 = $connexion->prepare("SELECT DISTINCT symptome.desc FROM symptome,keywords,keySympt WHERE keywords.idK=keySympt.idK AND keySympt.idS=symptome.idS AND keywords.name='$mot_cle_requete[$j]'");

		$query1->execute();

		

		while($data = $query1->fetch()){

		    $list_symptome[$i]['desc'] = $data['desc'];
		    $list_symptome[$i]['id']="symptome".(string)$i;

		    $i++;

		}
		
		
		$query1->closeCursor();
		//$name_symptome=array();
		
		if(isset($mot_cle_affiche)){
			$tpl->assign('mot_cle_affiche',$mot_cle_affiche);
		}
		
		
	}
	if(isset($list_symptome)){
		$tpl->assign('list_symptome', $list_symptome);
	}
	$i=0;
	foreach($list_symptome as $i => $valeur)
    {
    	//echo $i.'<br />'; // Pour faire mumuse mais ca sert a rien de l'afficher print_r le fait bien tout seul
    	print_r($valeur['id']);
    }
    echo $i;
    $compte=$i;
    $tpl->assign('compte',$compte);
    $tpl->display("requetesymptome.html");
}
	


//GESTION PAGE AFFICHAGE_PATHOLOGIE.HTML
//$compte=$i;


if ( isset($_POST['valider']) )
{	
	$symptome_coche = array();
	
	$j=0;

	//print_r($list_symptome);
	for ($k=0;$k<100;$k++){    //remplacer 100 par le nombre de checkbox
		$name="symptome".$k;
		if(isset($_POST[$name]))
			{	
				//echo $_POST[$name];
				$symptome_coche[$j]=$_POST[$name];
				$j++;
			}
	}
	

    //print_r($symptome_coche);
	//print_r($symptome_coche);
	//echo "compte symptome_coche".count($symptome_coche);
	
	$tpl->assign('list_symptomeCoche', $symptome_coche);
	//recuperation de la liste de type coché
	//requete de recuperation des pathologie à partire des critères cochés
	$i = 0;
	$list_patho = array();
	if(count($symptome_coche)!=0)
	{
		for ($j=0; $j < count($symptome_coche); $j++) { 
			$query5 = $connexion->prepare("SELECT DISTINCT patho.desc FROM patho,symptome,symptPatho WHERE patho.idP=symptPatho.idP AND symptPatho.idS=symptome.idS AND symptome.desc='$symptome_coche[$j]'");
			$query5->execute();
			while($data5 = $query5->fetch()){
				$list_patho[$i]['desc'] = $data5['desc'];
				$i++;
			}
			$query5->closeCursor();

		}
	}

	//assignation et affichage des pathologies trouvées
	$tpl->assign('list_patho', $list_patho);
	$tpl->display("affichage_pathologie.html");
}




?>