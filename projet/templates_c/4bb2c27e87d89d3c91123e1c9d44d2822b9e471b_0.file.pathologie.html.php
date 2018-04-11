<?php
/* Smarty version 3.1.30, created on 2018-04-11 20:38:33
  from "/home/tobefree/Documents/TobeFree/projet/sources/pathologie/pathologie.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ace5629090e16_96912709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bb2c27e87d89d3c91123e1c9d44d2822b9e471b' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/pathologie/pathologie.html',
      1 => 1523471649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ace5629090e16_96912709 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>Acupuncture</title>
		<link href="../sources/CSS/styleMain.css" rel="stylesheet" type="text/css"/>
		<?php echo '<script'; ?>
 type="text/javascript" src="../sources/JS/scriptMain.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div>
			<a href="./../accueil">
				<img src="../sources/images/logo.jpg" alt="Logo Acupuncture"><h1>Acupuncture</h1>
			</a>
		</div>
		<div class="menu">
			<nav>
				<ul>
					<li><a href="./../inscription">inscription</a></li>
					<li><a href="./../critere">Recherche de pathologie par critère</a></li>
					<li><a href="./../symptome">Recherche de pathologie par symptome</a></li>
					<li><a href="./../information">Informations</a></li>
					<li><a href="./../connexion"><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</a></li>
				</ul>
			</nav>
			<?php if (isset($_smarty_tpl->tpl_vars['pseudo']->value)) {?><p>Bonjour <?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
 !</p><?php }?>
		</div>
		<div class="corps">
			<h2><?php echo $_smarty_tpl->tpl_vars['patho']->value;?>
</h2>
			<p>Cette pathologie peut développer les symptomes suivants :</p>
			<ul>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_symptome']->value, 'symptome');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['symptome']->value) {
?>
				<li><?php echo $_smarty_tpl->tpl_vars['symptome']->value['desc'];?>
</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ul>
		</div>
	</body>
</html><?php }
}
