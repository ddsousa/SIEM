<h1>Dados do utilizador {$client['name']} <a href="{$BASE_URL}pages/clients/edit_client_details.php?id={$client['id']}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h1>
<table class="tab-details">
  <tr>
    <th>Nome:</th>
    <td>{$client['name']}</td>
  </tr>
  <tr>
    <th>Morada:</th>
    <td>{$client['address']}</td>
  </tr>
  <tr>
    <th>Código de Postal:</th>
    <td>{$client['zc1']}-{$client['zc2']}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{$client['email']}</td>
  </tr>
  <tr>
    <th>Telefone:</th>
    <td>{$client['phone']}</td>
  </tr>
</table>
