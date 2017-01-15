<h2>Formulário de registo de utilizador</h2>
<form method="POST" action="{$BASE_URL}actions/users/add_user.php" id="form-add-user"></form>
<table class="tab-details">
  <tr>
    <th>Nome</th>
    <td>
      <input type="text" name="name" form="form-add-user" placeholder="Insira o nome..." {if isset($FORM_VALUES.name)} value="{$FORM_VALUES.name}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Morada</th>
    <td>
      <input type="text" name="address" form="form-add-user" placeholder="Insira a morada..." {if isset($FORM_VALUES.address)} value="{$FORM_VALUES.address}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Código de Postal</th>
    <td>
      <input type="text" name="zc1" form="form-add-user" style="width: 6em;" maxlength=4 {if isset($FORM_VALUES.zc1)} value="{$FORM_VALUES.zc1}"{/if}>
      -
      <input type="text" name="zc2" form="form-add-user" style="width: 4em;" maxlength=3 {if isset($FORM_VALUES.zc2)} value="{$FORM_VALUES.zc2}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Email</th>
    <td>
      <input type="text" name="email" form="form-add-user" placeholder="Insira o endereço de email..." {if isset($FORM_VALUES.email)} value="{$FORM_VALUES.email}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Telefone</th>
    <td>
      <input type="text" name="phone" form="form-add-user" maxlength=9 placeholder="Insira o telefone" {if isset($FORM_VALUES.phone)} value="{$FORM_VALUES.phone}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Username</th>
    <td>
      <input type="text" name="username" form="form-add-user" placeholder="Username" {if isset($FORM_VALUES.username)} value="{$FORM_VALUES.username}"{/if}>
    </td>
  </tr>
  <tr>
    <th>Password</th>
    <td>
      <input type="password" name="password" form="form-add-user">
    </td>
  </tr>
  <tr>
    <th></th>
    <td>
      <input type="submit" class="btn-princ" form="form-add-user" value="Submeter">
    </td>
  </tr>
</table>
