<?php
/* Smarty version 3.1.30, created on 2018-03-09 13:08:07
  from "/var/www/html/projet/sources/pathologie/pathologie.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa279279d2ad1_05424855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e48b03a65717c1495952d7cd0603fea38fb64f4' => 
    array (
      0 => '/var/www/html/projet/sources/pathologie/pathologie.html',
      1 => 1519746705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa279279d2ad1_05424855 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>Nom pathologie</title>
		<link href="sources/styleMain.css" rel="stylesheet" type="text/css"/>
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
			<h2>Nom pathologie</h2>
			<p>Cette pathologie peut développer les symptomes suivants :</p>
			<ul>
				<li>symptome ...</li>
				<li>symptome ...</li>
				<li>...</li>
			</ul>
		</div>
	</body>
</html><?php }
}
