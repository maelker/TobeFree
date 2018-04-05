<?php
/* Smarty version 3.1.30, created on 2018-04-04 21:58:22
  from "/home/tobefree/Documents/TobeFree/projet/sources/menuglobal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac52e5e16bba0_02132111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1df14549d7adf63179c184e383316f2591881588' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/menuglobal.html',
      1 => 1522871875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac52e5e16bba0_02132111 (Smarty_Internal_Template $_smarty_tpl) {
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
				<img src="sources/images/logo.jpg"><h1>Acupuncture</h1>
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
