<?php
/* Smarty version 3.1.30, created on 2016-11-23 11:09:45
  from "/var/www/public/SIEM/TrabalhoPHP-2/templates/products/list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583578f921b074_29409292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a98d9c4f38d212d37728442b58276161e8cb585e' => 
    array (
      0 => '/var/www/public/SIEM/TrabalhoPHP-2/templates/products/list.tpl',
      1 => 1479899383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583578f921b074_29409292 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="products">
  <h2>Produtos</h2>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
      <article class="product-data">
        <img class="product-img" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
media/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
.jpg" alt="imagem de <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
        <br>
        <table class="tab-product-data">
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
            <td class="price"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
          </tr>
        </table>
      </article>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</section>
<?php }
}
