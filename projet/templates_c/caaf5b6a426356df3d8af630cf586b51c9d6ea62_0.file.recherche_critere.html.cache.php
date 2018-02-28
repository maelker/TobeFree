<?php
/* Smarty version 3.1.30, created on 2018-02-21 18:01:15
  from "/var/www/html/projet/recherche_critere.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8da5dbe63927_17126585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'caaf5b6a426356df3d8af630cf586b51c9d6ea62' => 
    array (
      0 => '/var/www/html/projet/recherche_critere.html',
      1 => 1518264772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a8da5dbe63927_17126585 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '16565446005a8da5dbe5f490_22698574';
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="keywords" content="critère, méridien, phatologie, caractéristique" />
	<meta name="author" content="2beefree" />
	<title>Recherche de pathologie par critère</title>
    <link rel="stylesheet" type="text/css" href="menu_deroulant.css" media="screen">
    <!--
A VOIR POUR LICENCE
 * Licence creative commons By
 * http://creativecommons.org/licenses/by/3.0/deed.fr
	-->
	
</head>

<body>
    
	<h1>Recherche de pathologie par critère</h1>
    
    <p>
       <label for="méridien">Choisissez le méridien:</label><br />
       <select name="méridien" id="méridien">
           <option value="méridien">Yin Qiao Mai</option>
           <option value="méridien">Yin Wei Mai</option>
           <option value="méridien">Yang Qiao Mai</option>
           <option value="méridien">Yang Wei Mai</option>
           <option value="méridien">Coeur</option>
           <option value="méridien">Chong Mai</option>
           <option value="méridien">Dai Mai</option>
           <option value="méridien">Du Mai</option>
           <option value="méridien">Estomac</option>
           <option value="méridien">Foie</option>           
           <option value="méridien">Gros intestin</option>
           <option value="méridien">Intestin Grêle</option>
           <option value="méridien">Protecteur du coeur</option>
           <option value="méridien">Poumon</option>
           <option value="méridien">Rein</option>
           <option value="méridien">Ren Mai</option>
           <option value="méridien">Rate Pancréas</option>
           <option value="méridien">Triple réchauffeur</option>
           <option value="méridien">Vessie</option>
           <option value="méridien">Vésicule Biliaire</option>



       </select>
    </p>
    
    <p>
       <label for="méridien">Choisissez la pathologie</label><br />
       <select name="pathologie" id="pathologie">
           <option value="pathologie">méridien du coeur</option>
           <option value="pathologie">méridien du poumon</option>
           <option value="pathologie">méridien du foie</option>
           <option value="pathologie">méridien de la rate</option>
           <option value="pathologie">méridien du rein</option>
           <option value="pathologie">méridien de l'estomac </option>
           <option value="pathologie">méridien du gros intestin</option>
           <option value="pathologie">méridien de l'intestin grêle</option>
           <option value="pathologie">méridien de la vessie</option>
           <option value="pathologie">méridien du maître du coeur</option>           
           <option value="pathologie">méridien du triple réchauffeur</option>
           <option value="pathologie">méridien de la vésicule biliaire</option>
           


       </select>
    </p>
    
	<footer>
		<p>Bas de page</p>
		
		
		Licence creative commons By <a href="http://creativecommons.org/licenses/by/3.0/deed.fr">http://creativecommons.org/licenses/by/3.0/deed.fr</a>
	</footer>
	
</body>
</html><?php }
}
