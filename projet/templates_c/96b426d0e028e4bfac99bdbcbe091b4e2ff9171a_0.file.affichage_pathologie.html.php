<?php
/* Smarty version 3.1.30, created on 2018-04-03 16:57:49
  from "/home/tobefree/Documents/TobeFree/projet/sources/symptome/affichage_pathologie.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac3966d601ef9_96182769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96b426d0e028e4bfac99bdbcbe091b4e2ff9171a' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/symptome/affichage_pathologie.html',
      1 => 1522767466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac3966d601ef9_96182769 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="2beefree" />
		<title>affichage pathologie</title>
		<link href="sources/styleMain.css" rel="stylesheet" type="text/css"/>
		<link href="symptomeStyle.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>	
			<div>
				<h3>Résultat de la recherche</h3>
				<ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_patho']->value, 'patho');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['patho']->value) {
?>
					<li><a href="./pathologie/<?php echo $_smarty_tpl->tpl_vars['patho']->value['under'];?>
" target="blank"><?php echo $_smarty_tpl->tpl_vars['patho']->value['desc'];?>
</a></li>
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
