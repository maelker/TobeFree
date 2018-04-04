<?php
/* Smarty version 3.1.30, created on 2018-04-04 22:13:56
  from "/home/tobefree/Documents/TobeFree/projet/sources/login/connexion.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac53204c86b41_86565705',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52b9bc59161871fd303c10701918146ee0047c87' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/login/connexion.html',
      1 => 1522872724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac53204c86b41_86565705 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<body>
		<div class="corps">
			
			<div class="column" >
				<h2>Connexion</h2>
				<form action="" method = "post">
					<label class="log"><p>Login </p><input type="text" id= "pseudo" name="pseudo"></label>
					<label class="log"><p>Password</p><input type="password" id ="pass" name="pass"></label>
					<input type="submit" value="Connexion" class="valider">
				</form>
				<input type ="button" class="valider" value ='logout' onclick="window.location.href = './deconnexion'" >
			</div>
		</div>
	</body>
</html>
	
	
	
	



<?php }
}
