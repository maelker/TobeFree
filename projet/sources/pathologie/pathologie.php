<?php

$tpl = new Smarty();
$tpl->compile_dir='templates_c/';

//connexion à la bdd pour les requetes
try{
	$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$list_symptome = array();
$patho=str_replace('_',' ',$patho);

$query1 = $connexion->prepare("SELECT DISTINCT symptome.desc FROM symptome,symptPatho,patho WHERE patho.desc='$patho' AND patho.idP=symptPatho.idP AND symptPatho.idS=symptome.idS");
$query1->execute();
$i = 0;
while($data = $query1->fetch()){
    $list_symptome[$i]['desc'] = $data['desc'];
    $i++;
}
$query1->closeCursor();

$tpl->assign('patho', $patho);
$tpl->assign('list_symptome', $list_symptome);
$tpl->display("sources/pathologie/pathologie.html");

?>