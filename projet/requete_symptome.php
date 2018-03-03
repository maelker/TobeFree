<?php

// Extraction des informations

$connexion = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'rcwEsl5y');
$query1 = $connexion->prepare("SELECT nom FROM meridien ");

$query1->execute();


$list_meridien = array();

$i = 0;

while($data = $query1->fetch()){

    $list_meridien[$i]['nom'] = $data['nom'];

    $i++;

}
$query1->closeCursor();

$query2 = $connexion->prepare("SELECT DISTINCT type FROM pathoType");

$query2->execute();


$list_type = array();

$i = 0;

while($data2 = $query2->fetch()){

    $list_type[$i]['type'] = $data2['type'];

    $i++;

}
$query2->closeCursor();

$query3 = $connexion->prepare("SELECT DISTINCT carac FROM pathoType WHERE carac !=''");
 
$query3->execute();


$list_carac = array();

$i = 0;

while($data3 = $query3->fetch()){

    $list_carac[$i]['carac'] = $data3['carac'];

    $i++;

}
$query3->closeCursor();

// On lance Smarty


require("lib/smarty/Smarty.class.php");


$tpl = new Smarty();


$tpl->assign('list_meridien', $list_meridien);
$tpl->assign('list_type', $list_type);
$tpl->assign('list_carac', $list_carac);


$tpl->display("sources/critere/critere.html");

?>