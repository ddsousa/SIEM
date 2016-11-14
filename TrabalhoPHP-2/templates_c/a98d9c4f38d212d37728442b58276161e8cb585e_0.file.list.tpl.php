<?php
/* Smarty version 3.1.30, created on 2016-11-14 12:16:17
  from "/var/www/public/SIEM/TrabalhoPHP-2/templates/products/list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829ab11082e71_79193977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a98d9c4f38d212d37728442b58276161e8cb585e' => 
    array (
      0 => '/var/www/public/SIEM/TrabalhoPHP-2/templates/products/list.tpl',
      1 => 1479125774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5829ab11082e71_79193977 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Oceano Hipermercados</title>
    <link rel="stylesheet" href="<?php echo '<?=';?>$BASE_URL<?php echo '?>';?>css/style.css">
    <meta charset="utf-8">
  </head>
  <body>
    <section id="products">
      <h2>Produtos</h2>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
        <article class="product-data">
          <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
media/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
.jpg" alt="imagem de <?php echo $_smarty_tpl->tpl_vars['product']->value['nome'];?>
">
          <span><?php echo $_smarty_tpl->tpl_vars['product']->value['nome'];?>
</span>
          <span><?php echo $_smarty_tpl->tpl_vars['product']->value['preco'];?>
</span>
        </article>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    </section>
  </body>
</html>
<?php }
}
