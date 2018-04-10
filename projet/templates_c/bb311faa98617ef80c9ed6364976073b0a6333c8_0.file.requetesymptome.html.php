<?php
/* Smarty version 3.1.30, created on 2018-04-10 17:18:46
  from "/home/tobefree/Documents/TobeFree/projet/sources/symptome/requetesymptome.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5accd5d63100f4_67840473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb311faa98617ef80c9ed6364976073b0a6333c8' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/symptome/requetesymptome.html',
      1 => 1522914371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5accd5d63100f4_67840473 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<body>	
			<div>
				<form method="post" action="" >	
				<fieldset>
					<legend>Mots clés sélectionnés :<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mot_cle_affiche']->value, 'mot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mot']->value) {
?> <?php echo $_smarty_tpl->tpl_vars['mot']->value;?>
,<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</legend>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_symptome']->value, 'symptome');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['symptome']->value) {
?>
						<label><input type="checkbox" name=<?php echo $_smarty_tpl->tpl_vars['symptome']->value['id'];?>
 value="<?php echo $_smarty_tpl->tpl_vars['symptome']->value['desc'];?>
"><?php echo $_smarty_tpl->tpl_vars['symptome']->value['desc'];?>
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
