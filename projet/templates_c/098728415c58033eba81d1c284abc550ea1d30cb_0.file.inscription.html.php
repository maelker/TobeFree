<?php
/* Smarty version 3.1.30, created on 2018-04-11 20:37:39
  from "/home/tobefree/Documents/TobeFree/projet/sources/inscription/inscription.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ace55f370ab17_93373130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '098728415c58033eba81d1c284abc550ea1d30cb' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/inscription/inscription.html',
      1 => 1523467316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ace55f370ab17_93373130 (Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="corps">
			<form method="post" >
				<h2>Inscription</h2>
				<label>Pseudo: <input type="text" name="pseudo" required /></label><br/>
				<label>Mot de passe: <input type="password" name="passe" required /></label><br/>
				<label>Confirmation du mot de passe: <input type="password" name="passe2" required oninput="check(this)"/></label><br/>
				<label>Adresse e-mail: <input type="email" name="email" required /></label><br/>
				<input type="submit" value="M'inscrire"/>
			</form>
			<p id = "erreur"><?php echo $_smarty_tpl->tpl_vars['erreur']->value;?>
</p>
		</div>
	</body>
</html><?php }
}
