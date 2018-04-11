<?php
/* Smarty version 3.1.30, created on 2018-04-11 20:37:39
  from "/home/tobefree/Documents/TobeFree/projet/sources/critere/critere.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ace55f37ba7c1_31315594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6fad209abad00f0399b33dcc6326c7738847756' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/critere/critere.html',
      1 => 1523470688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ace55f37ba7c1_31315594 (Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="corps">
			<h2>Recherche de pathologie par critère</h2>
			<form method="post">
				<span class="deroule" onclick="javascript:toggleDisplay(this,'meridien')"><img src="sources/images/flecheBas.png" width="25" height="25" alt="Fleche"> Selection du méridien</span>
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
				<span class="deroule" onclick="javascript:toggleDisplay(this,'type')"><img src="sources/images/flecheBas.png" width="25" height="25" alt="Fleche">Selection du type de pathologie</span>
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
				<span class="deroule" onclick="javascript:toggleDisplay(this,'caract')"><img src="sources/images/flecheBas.png" width="25" height="25" alt="Fleche">Selection des caractéristiques</span>
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
				<input type="submit" name="valider" value="Valider" class="valider">
			</form>
		</div>
	</body>
</html><?php }
}
