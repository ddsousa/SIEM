<h2>Formulário de registo de administrador</h2>

<form method="POST" action="{$BASE_URL}actions/users/add_admin.php" id="form-add-admin"></form>
<table class="tab-details">
  <tr>
    <th>Username</th>
    <td>
      <input type="text" name="username" form="form-add-admin" placeholder="Username" {if isset($FORM_VALUES.username)} value="{$FORM_VALUES.username}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Password</th>
    <td>
      <input type="password" name="password" form="form-add-admin">
    </td>
  </tr>
  <tr>
    <th></th>
    <td>
      <input type="submit" clasS="btn-princ" form="form-add-admin" value="Submeter">
    </td>
  </tr>
</table>
