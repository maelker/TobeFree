<?php

// Extraction des informations

$connexion = new PDO('mysql:host=localhost;dbname=acuBD;charset=utf8', 'root', 'root');
$query1 = $connexion->prepare("SELECT DISTINCT symptome.desc FROM symptome,keywords,keySympt WHERE keywords.idK=keySympt.idK AND keySympt.idS=symptome.idS");

$query1->execute();


$list_symptome = array();

$i = 0;

while($data = $query1->fetch()){

    $list_symptome[$i]['desc'] = $data['desc'];

    $i++;

}
$query1->closeCursor();
require("lib/smarty/Smarty.class.php");


$tpl = new Smarty();


$tpl->assign('list_symptome', $list_symptome);



$tpl->display("sources/symptome/symptome.html");

?>