<?php
/* Smarty version 3.1.30, created on 2017-01-26 20:10:32
  from "/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a57b8a03592_05967023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7bea90e43c5a25b9ace9030fc0843d71721dd6d' => 
    array (
      0 => '/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/common/navbar.tpl',
      1 => 1485460235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588a57b8a03592_05967023 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="nav-container">
<section class="navbar menu">
	<ul>
		<li id="nav_home"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/other/home.php">Início</a></li>
		<li id="nav_list_all"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/list_all.php">Produtos</a></li>
		<li id="nav_report"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/other/report.php">Relatório</a></li>
		<?php if (isset($_smarty_tpl->tpl_vars['USERNAME']->value)) {?>
			<li id="nav_list_all_orders"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/orders/list_all_orders.php">Encomendas</a></li>
			<?php if (isset($_smarty_tpl->tpl_vars['PERMISSIONS']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['PERMISSIONS']->value == 1) {?>
					<li id="nav_list_all_clients"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/clients/list_all_clients.php">Clientes</a></li>
					<li id="nav_list_all_stocks"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/stocks/list_all_stocks.php">Stocks</a></li>
				<?php }?>
			<?php }?>
		<?php }?>
	</ul>
</section>
<section id="search">
	<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/list_all.php">
		<label for="search-input">
			<i class="fa fa-search" aria-hidden="true"></i>
		</label>
		<input id="search-input" type="text" placeholder="Pesquisa" tabindex="1" name="search">
	</form>
</section>
</div>
<?php }
}
