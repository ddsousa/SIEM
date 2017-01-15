<h1>Alterar os dados do utilizador {$client['name']}</h1>
<form method="POST" id="form-edit-client-details" action="{$BASE_URL}actions/clients/edit_client_details.php?id={$client['id']}"></form>
<table class="tab-details">
  <tr>
    <th>Nome:</th>
    <td>
      <input type="text" form="form-edit-client-details" value="{$client['name']}" name="name">
    </td>
  </tr>
  <tr>
    <th>Morada:</th>
    <td>
      <input type="text" form="form-edit-client-details" value="{$client['address_name']}" name="address_name">
    </td>
  </tr>
  <tr>
    <th>Código de Postal:</th>
    <td>
      <input type="text" form="form-edit-client-details" value="{$client['zc1']}" name="zc1" style="width: 6em;" maxlength=4>
      -
      <input type="text" form="form-edit-client-details" value="{$client['zc2']}" name="zc2"style="width: 4em;" maxlength=3>
    </td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>
      <input type="text" form="form-edit-client-details" value="{$client['email']}" name="email">
    </td>
  </tr>
  <tr>
    <th>Telefone:</th>
    <td>
      <input type="text" form="form-edit-client-details" value="{$client['phone']}" name="phone" maxlength=9>
    </td>
  </tr>
  {if $PERMISSIONS eq 0}
    <tr>
      <th>Username:</th>
      <td>
        <input type="text" form="form-edit-client-details" value="{$client['username']}" name="username">
      </td>
    </tr>
    <tr>
      <th>Password:</th>
      <td>
        <input type="password" form="form-edit-client-details" placeholder="Password" name="password">
      </td>
    </tr>
  {/if}
  <tr>
    <th></th>
    <td>
      <input class="btn-princ" type="submit" form="form-edit-client-details" value="Editar">
    </td>
  </tr>
</table>
