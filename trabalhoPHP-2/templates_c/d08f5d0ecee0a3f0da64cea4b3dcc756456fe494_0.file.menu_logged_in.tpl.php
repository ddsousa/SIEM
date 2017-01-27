<?php
/* Smarty version 3.1.30, created on 2017-01-26 20:10:41
  from "/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/menu_logged_in.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a57c1ed6ed5_49509907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd08f5d0ecee0a3f0da64cea4b3dcc756456fe494' => 
    array (
      0 => '/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/menu_logged_in.tpl',
      1 => 1485460235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588a57c1ed6ed5_49509907 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="logged_in">
	<span class="username">
		<?php if ($_smarty_tpl->tpl_vars['PERMISSIONS']->value == 0) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/clients/client_details.php?id=<?php echo $_SESSION['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</a>
		<?php } else { ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</a>
		<?php }?>
	</span>
	<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">
		<input type="submit" value="Logout" style="float: right;">
	</form>
	<br>
	<div style="margin-top: 0.5em; padding-right: 0">
		<?php if ($_smarty_tpl->tpl_vars['PERMISSIONS']->value == 0) {?> <!-- user -->
			<?php if (isset($_SESSION['cart'])) {?>
				<?php if (count($_SESSION['cart']) == 1) {?>
					<span class="num-cart-items">1 artigo no carrinho</span>
				<?php } else { ?>
					<span class="num-cart-items"><?php echo count($_SESSION['cart']);?>
 artigos no carrinho</span>
				<?php }?>
			<?php }?>
			<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/display_cart.php">
				<button type="submit" name="btn-checkout" style="margin-right: 0;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</button>
			</form>
		<?php } else { ?> <!-- admin -->
			<select name="user-type" class="dropdown" onchange="addUser('<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
', this)" style="margin-right: 0 !important;">
				<option value="" disabled selected><i class="fa fa-user-circle" aria-hidden="true"></i> Adicionar Utilizador</option>
				<option value="user">Utilizador</option>
				<option value="admin">Administrador</option>
			</select>
		<?php }?>
	</div>
</div>
<?php }
}
