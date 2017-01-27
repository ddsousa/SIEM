<?php
/* Smarty version 3.1.30, created on 2017-01-26 20:25:04
  from "/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/products/list_most_sold.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a5b20b72885_75719081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '613920039095604cc13f84e1f9e114f62bf4cd25' => 
    array (
      0 => '/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/products/list_most_sold.tpl',
      1 => 1485460235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588a5b20b72885_75719081 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="products">
  <h2>Produtos mais vendidos</h2>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products_most_sold']->value, 'product_ms');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_ms']->value) {
?>
      <article class="product-data">
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/details.php?id=<?php echo $_smarty_tpl->tpl_vars['product_ms']->value['id'];?>
"><img class="product-img" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
media/img/products/<?php echo $_smarty_tpl->tpl_vars['product_ms']->value['id'];?>
.jpg" alt="imagem de <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
"></a>
        <br>
        <table class="tab-product-data">
          <tr>
            <td><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/details.php?id=<?php echo $_smarty_tpl->tpl_vars['product_ms']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product_ms']->value['name'];?>
</a></td>
            <td class="price"><?php echo $_smarty_tpl->tpl_vars['product_ms']->value['price'];?>
€/un</td>
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
