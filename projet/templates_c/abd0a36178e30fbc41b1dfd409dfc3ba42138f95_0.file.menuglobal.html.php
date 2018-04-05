<?php
/* Smarty version 3.1.30, created on 2018-04-04 21:54:10
  from "/home/tobefree/Documents/TobeFree/projet/menuglobal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac52d628cea78_04821667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abd0a36178e30fbc41b1dfd409dfc3ba42138f95' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/menuglobal.html',
      1 => 1522871527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac52d628cea78_04821667 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>Acupuncture</title>
		<link href="sources/CSS/styleMain.css" rel="stylesheet" type="text/css"/>
		<link href="symptomeStyle.css" rel="stylesheet" type="text/css"/>
		<?php echo '<script'; ?>
 type="text/javascript" src="sources/scriptMain.js"><?php echo '</script'; ?>
>
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
					<li><a href="./connexion">Connexion</a></li>
				</ul>
			</nav>
		</div>
	</body>
</html><?php }
}
