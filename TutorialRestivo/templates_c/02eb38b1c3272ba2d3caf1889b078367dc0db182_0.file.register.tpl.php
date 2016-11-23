<?php
/* Smarty version 3.1.30, created on 2016-11-23 09:36:13
  from "/var/www/public/SIEM/TutorialRestivo/templates/users/register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5835630ddbf506_53359984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02eb38b1c3272ba2d3caf1889b078367dc0db182' => 
    array (
      0 => '/var/www/public/SIEM/TutorialRestivo/templates/users/register.tpl',
      1 => 1479893460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5835630ddbf506_53359984 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="register">
  <h2>Register</h2>

  <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post">
    <label>Name: <input type="text" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['realname'];?>
"></label><br>
    <label>Username: <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
"></label><br>
    <label>Password: <input type="password" name="password" value=""></label><br>
    <input type="submit" value="Register">
  </form>

</section>
<?php }
}
