<?php
/* Smarty version 3.1.30, created on 2017-01-26 20:10:32
  from "/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/menu_logged_out.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a57b89b0c46_17380689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72c5c1bfb6be6524044e33416e933e1c6f902776' => 
    array (
      0 => '/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/menu_logged_out.tpl',
      1 => 1485460235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588a57b89b0c46_17380689 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="logged_out">
	<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
	  <input type="text" placeholder="username" name="username">
	  <input type="password" placeholder="password" name="password">
	  <input type="submit" value="Login">
	</form>
	<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php" method="post">
		<input type="submit" value="Registar" class="register">
	</form>
</div><?php }
}
