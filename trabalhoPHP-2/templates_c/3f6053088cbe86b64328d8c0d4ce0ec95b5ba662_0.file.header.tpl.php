<?php
/* Smarty version 3.1.30, created on 2017-01-26 20:10:32
  from "/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a57b892dd61_61231659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f6053088cbe86b64328d8c0d4ce0ec95b5ba662' => 
    array (
      0 => '/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/header.tpl',
      1 => 1485460235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/menu_logged_in.tpl' => 1,
    'file:common/menu_logged_out.tpl' => 1,
    'file:common/navbar.tpl' => 1,
    'file:common/prod_type_menu.tpl' => 1,
  ),
),false)) {
function content_588a57b892dd61_61231659 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Oceano Hipermercados</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/style.css">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
media/img/logos/icon.png">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://use.fontawesome.com/f437aa5e06.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/main.js"><?php echo '</script'; ?>
>
    <meta charset="utf-8">
  </head>
  <body>
  	<div id="wrapper">
			<header>
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/other/home.php"><img id="logo" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
media/img/logos/logo.png" alt="Logotype"></a>
				<?php if (isset($_smarty_tpl->tpl_vars['USERNAME']->value)) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:common/menu_logged_in.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<?php } else { ?>
					<?php $_smarty_tpl->_subTemplateRender("file:common/menu_logged_out.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<?php }?>
			</header>
			<?php $_smarty_tpl->_subTemplateRender("file:common/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<?php if (isset($_smarty_tpl->tpl_vars['products_page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['products_page']->value) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:common/prod_type_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<?php }?>
			<?php }?>
			<div id="error_messages">
				<?php if (isset($_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value)) {?>
				  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
				    <a class="close" href="#"><div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div></a>
				  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>
			</div>
			<div id="success_messages">
				<?php if (isset($_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value)) {?>
				  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value, 'success');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['success']->value) {
?>
				    <a class="close" href="#"><div class="success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div></a>
				  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>
			</div>
			<div id="container">
<?php }
}
