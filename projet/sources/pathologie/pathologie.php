<?php

$tpl = new Smarty();
$tpl->compile_dir='templates_c/';


$tpl->assign('patho', $patho);
$tpl->display("sources/pathologie/pathologie.html");

?>