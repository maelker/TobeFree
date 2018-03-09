<?php
/* Smarty version 3.1.30, created on 2018-03-09 13:07:52
  from "/var/www/html/projet/sources/symptome/symptome.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa27918a15b61_30400411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b03ba34a4461b5384f32fb6161bb8fc5f3470b6' => 
    array (
      0 => '/var/www/html/projet/sources/symptome/symptome.html',
      1 => 1520236068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa27918a15b61_30400411 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>Recherche symptome</title>
		<link href="sources/styleMain.css" rel="stylesheet" type="text/css"/>
		<link href="symptomeStyle.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div>
			<a href="./accueil">
				<img src="sources/images/logo.jpg"><h1>Nom site</h1>
			</a>
		</div>
		<div class="menu">
			<nav>
				<ul>
					<li><a href="./inscription">inscription</a></li>
					<li><a href="./critere">Recherche de pathologie par critère</a></li>
					<li><a href="./symptome">Recherche de pathologie par symptome</a></li>
					<li><a href="./information">Informations</a></li>
				</ul>
			</nav>
		</div>
		<div class="corps">
			<h2>Recherche de pathologie par symptomes</h2>
			<form method="post" action="" >
				<p>Entrez un mot clé du symptome recherché</p>
				<input type="search" name="keyword" placeholder="mot-clé" size="50">
				<input type="submit" name="recherche" class="search" value="rechercher">
			</form>
			<form method="post" action="" >
				<fieldset>
					<legend>mot-clé 1</legend>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_symptome']->value, 'symptome');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['symptome']->value) {
?>
						<label><input type="checkbox" name="symptome1"><?php echo $_smarty_tpl->tpl_vars['symptome']->value['desc'];?>
 1</label>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


				</fieldset>
				<fieldset>
					<legend>mot-clé 2</legend>
					<label><input type="checkbox" name="symptome3">Symptome 3</label>
					<label><input type="checkbox" name="symptome4">Symptome 4</label>
				</fieldset>
				<input type="submit" name="valider" class="valider">
			</form>
			<div>
				<h3>Résultat de la recherche</h3>
				<ul>
					<li><a href="./pathologie" target="blank">Pathologie1</a></li>
					<li><a href="./pathologie" target="blank">Pathologie2</a></li>
					<li><a href="./pathologie" target="blank">Pathologie3</a></li>
				</ul>
			</div>
		</div>
	</body>
</html><?php }
}
