<?php
/* Smarty version 3.1.30, created on 2018-04-11 20:38:30
  from "/home/tobefree/Documents/TobeFree/projet/sources/critere/resultat.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ace56262dd4d6_80063629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97bc67755ae3daf5cebdc3628c26f80c0469becc' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/critere/resultat.html',
      1 => 1523467528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ace56262dd4d6_80063629 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="corps">
	<h2>Résultat de la recherche :</h2>
	<p>Critères sélectionnés :<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_meridienCoche']->value, 'meridien');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['meridien']->value) {
echo $_smarty_tpl->tpl_vars['meridien']->value;?>
, <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_typeCoche']->value, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
echo $_smarty_tpl->tpl_vars['type']->value;?>
, <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_caractCoche']->value, 'caract');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['caract']->value) {
echo $_smarty_tpl->tpl_vars['caract']->value;?>
, <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 </p>
	<h3>Pathologies trouvées :</h3>
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
<?php }
}
