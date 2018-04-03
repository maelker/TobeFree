<?php
/* Smarty version 3.1.30, created on 2018-04-03 17:31:32
  from "/home/tobefree/Documents/TobeFree/projet/sources/symptome/symptome.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac39e54215280_54976862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9e1d63e0df5f963fa8a08227cc1bcca398c78eb' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/symptome/symptome.html',
      1 => 1522769340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac39e54215280_54976862 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<body>
		<div class="corps">
			<h2>Recherche de pathologie par symptomes</h2>
			<form method="post" action="">
				<p>Entrez un mot clé du symptome recherché</p>
				<input type="search" name="keyword" placeholder="mot-clé1,mot-clé2,mot-clé3,etc." size="50">
				<input type="submit" name="recherche" class="search" value="rechercher">
			</form>	
			
		</div>
	</body>
</html><?php }
}
