<?php
/* Smarty version 3.1.30, created on 2018-03-15 20:56:27
  from "/home/tobefree/Documents/TobeFree/projet/sources/critere/critere.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaacfeb39b7c6_89543103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '578dc61ab95d07b2f732e8e96b64568beea64a2c' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/critere/critere.html',
      1 => 1521139284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aaacfeb39b7c6_89543103 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>Recherche critère</title>
		<link href="../CSS/styleMain.css" rel="stylesheet" type="text/css"/>
		<?php echo '<script'; ?>
 type="text/javascript" src="../scriptMain.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div>
			<a href="./accueil">
				<img src="../images/logo.jpg"><h1>Nom site</h1>
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
			<h2>Recherche de pathologie par critère</h2>
			<form method="post" action="" >
				<span class="deroule" onclick="javascript:toggleDisplay(this,'meridien')"><img src="../images/flecheBas.png" width="25" height="25"> Selection du méridien</span>
				<fieldset id="meridien">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_meridien']->value, 'meridien');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['meridien']->value) {
?>
						<label><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['meridien']->value['nom'];?>
"><?php echo $_smarty_tpl->tpl_vars['meridien']->value['nom'];?>
</label>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</fieldset>
				<span class="deroule" onclick="javascript:toggleDisplay(this,'type')"><img src="../images/flecheBas.png" width="25" height="25">Selection du type de pathologie</span>
				<fieldset id="type">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_type']->value, 'listtype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['listtype']->value) {
?>
						<label><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['listtype']->value['type'];?>
"><?php echo $_smarty_tpl->tpl_vars['listtype']->value['type'];?>
</label>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</fieldset>
				<span class="deroule" onclick="javascript:toggleDisplay(this,'caract')"><img src="../images/flecheBas.png" width="25" height="25">Selection des caractéristiques</span>
				<fieldset id="caract">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_carac']->value, 'listcarac');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['listcarac']->value) {
?>
						<label><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['listcarac']->value['carac'];?>
"><?php echo $_smarty_tpl->tpl_vars['listcarac']->value['carac'];?>
</label>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</fieldset>
				<input type="submit" name="valider" class="valider">
			</form>
		</div>
	</body>
</html><?php }
}
