<?php
/* Smarty version 3.1.30, created on 2018-04-03 17:58:20
  from "/home/tobefree/Documents/TobeFree/projet/sources/accueil/page_accueil.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac3a49cb27e10_83850262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc4f0b12290269b483d41fc1be95bcc19f103e5a' => 
    array (
      0 => '/home/tobefree/Documents/TobeFree/projet/sources/accueil/page_accueil.html',
      1 => 1522770961,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac3a49cb27e10_83850262 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
	<body>
		<div class="corps">
			<h2>Bienvenue sur notre site</h2>
			<p>Site de l'association des acupuncteurs pour rechercher vos maladies.</p>
			<a href="./pathologie">Pathologie</a>
		</div>
	</body>
	<?php echo '<?php 
	';?>if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
		echo 'Bonjour ' . $_SESSION['pseudo'];
	}
	<?php echo '?>';?>
</html><?php }
}
