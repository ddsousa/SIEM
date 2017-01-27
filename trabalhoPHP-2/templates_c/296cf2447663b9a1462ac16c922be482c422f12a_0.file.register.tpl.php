<?php
/* Smarty version 3.1.30, created on 2017-01-26 21:04:11
  from "/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/users/register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a644bb576d4_40931479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '296cf2447663b9a1462ac16c922be482c422f12a' => 
    array (
      0 => '/usr/users2/mieec2012/ee12036/public_html/trabalhosSiem/trabalhoPHP-2/templates/users/register.tpl',
      1 => 1485460235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588a644bb576d4_40931479 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="register">
  <h2>Registo</h2>

  <form name="register_form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" onsubmit="return validateForm()" method="post">
    <label>Nome:</label>
      <input type="text" name="name" placeholder="Insira o seu nome" <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['name'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['name'];?>
"<?php }?>  >
      <span class="field_error" id="name"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['name'])) {?> {}$FIELD_ERRORS.name} <?php }?></span>
    <br>
    <label>Morada:</label>
      <input type="text" name="address" placeholder="Insira a sua morada" <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['address'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['address'];?>
" <?php }?>  >
      <span class="field_error" id="address"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['address'])) {?> <?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['address'];?>
 <?php }?></span>
    <br>
    <label>Código-Postal:</label>
      <input type="text" name="zipcode1" style="width: 6em;" maxlength=4 <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['zipcode1'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['zipcode1'];?>
" <?php }?>>
      -
      <input type="text" name="zipcode2" style="width: 4em;" maxlength=3 <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['zipcode2'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['zipcode2'];?>
" <?php }?>>
      <span class="field_error" id="zipcode"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['zipcode'])) {?> <?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['zipcode'];?>
 <?php }?></span>
    <br>
    <label>Email:</label>
      <input type="email" name="email" placeholder="Insira o seu email" <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
" <?php }?>  >
      <span class="field_error" id="email"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['email'])) {?> <?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['email'];?>
 <?php }?></span>
    <br>
    <label>Telefone:</label>
      <input type="text" name="phone" maxlength=9 <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['phone'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['phone'];?>
" <?php }?> class="small"  >
      <span class="field_error" id="phone"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['phone'])) {?> <?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['phone'];?>
 <?php }?></span>
    <br>
    <label>Username:</label>
      <input type="text" name="username" <?php if (isset($_smarty_tpl->tpl_vars['FORM_VALUES']->value['name'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
" <?php }?> class="small">
      <span class="field_error" id="username"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['username'])) {?> <?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['username'];?>
 <?php }?></span>
    <br>
    <label>Password:</label>
      <input type="password" name="password" value="" class="small">
      <span class="field_error" id="password"><?php if (isset($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['password'])) {?> <?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['password'];?>
 <?php }?></span>
    <br>
    <input type="submit" value="Registrar">
  </form>

</section>
<?php }
}
