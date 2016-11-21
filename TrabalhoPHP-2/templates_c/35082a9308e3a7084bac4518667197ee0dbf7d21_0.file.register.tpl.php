<?php
/* Smarty version 3.1.30, created on 2016-11-21 12:23:47
  from "/var/www/public/SIEM/TrabalhoPHP-2/templates/users/register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5832e753c517a6_34725080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35082a9308e3a7084bac4518667197ee0dbf7d21' => 
    array (
      0 => '/var/www/public/SIEM/TrabalhoPHP-2/templates/users/register.tpl',
      1 => 1479731015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5832e753c517a6_34725080 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="register">
  <h2>Register</h2>

  <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post">
    <label>Nome: <input type="text" name="name" placeholder="Insira o seu nome" value=""></label><br>
    <label>Morada: <input type="text" name="address" placeholder="Insira a sua morada" value=""></label><br>
    <label>Código-Postal: <input type="text" name="zipcode1" style="width: 6em;" maxlength=4 value=""></label>
    -<input type="text" name="zipcode2" style="width: 4em;" maxlength=3     value=""><br>
    <label>Email: <input type="email" name="email" placeholder="Insira o seu email" value=""></label><br>
    <label>Telefone: <input type="text" name="phone" maxlength=9 value=""></label><br>
    <label>Username: <input type="text" name="username" value=""></label><br>
    <label>Password: <input type="password" name="password" value=""></label><br>
    <input type="submit" value="Registrar">
  </form>

</section>
<?php }
}
