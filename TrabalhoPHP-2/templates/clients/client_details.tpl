<h1  style="display: inline-block;">Dados do utilizador {$client['name']} <a href="{$BASE_URL}pages/clients/edit_client_details.php?id={$client['id']}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h1>
<a style="position: absolute; right: 0px; margin-top:5px;" href="../../pages/orders/list_all_orders.php?user={$id}"><input type="button" value="Ver encomendas" style="margin-top: 1em; height:2.5em; font-size: 1.01em; color: white;" class="btn-princ"></input></a>

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
