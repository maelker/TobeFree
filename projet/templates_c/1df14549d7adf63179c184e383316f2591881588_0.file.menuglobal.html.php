<?php
/* Smarty version 3.1.30, created on 2018-04-11 20:37:32
  from "/home/tobefree/Documents/TobeFree/projet/sources/menuglobal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ace55ec37dfd1_78844716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1df14549d7adf63179c184e383316f2591881588' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/menuglobal.html',
      1 => 1523467234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ace55ec37dfd1_78844716 (Smarty_Internal_Template $_smarty_tpl) {
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
 type="text/javascript" src="sources/JS/scriptMain.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div class="head">
			<a href="./accueil">
				<img src="sources/images/logo.jpg" alt="Acupuncture logo"><h1>Acupuncture</h1>
			</a>
		</div>
		<div class="menu">
			<nav>
				<ul>
					<li><a href="./inscription">Inscription</a></li>
					<li><a href="./critere">Recherche de pathologie par critère</a></li>
					<li><a href="./symptome">Recherche de pathologie par symptome</a></li>
					<li><a href="./information">Informations</a></li>
					<li><a href="./connexion" ><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</a></li>
				</ul>
			</nav>
			<?php if (isset($_smarty_tpl->tpl_vars['pseudo']->value)) {?><p>Bonjour <?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
 !</p><?php }?>
		</div>
<?php }
}
