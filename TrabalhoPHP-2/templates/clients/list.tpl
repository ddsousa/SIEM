<h1>Clientes</h1>
<table class="tab-blue">
  <tr>
    <th>Nome</th>
    <th>Morada</th>
    <th>Código Postal</th>
    <th>Email</th>
    <th>Telefone</th>
  </tr>
  {foreach $clients as $client}
    <tr>
      <td><a href="{$BASE_URL}pages/clients/client_details.php?id={$client['id']}">{$client['name']}</a></td>
      <td><a href="{$BASE_URL}pages/clients/client_details.php?id={$client['id']}">{$client['address_name']}</a></td>
      <td><a href="{$BASE_URL}pages/clients/client_details.php?id={$client['id']}">{$client['zip-code']}</a></td>
      <td><a href="{$BASE_URL}pages/clients/client_details.php?id={$client['id']}">{$client['email']}</a></td>
      <td><a href="{$BASE_URL}pages/clients/client_details.php?id={$client['id']}">{$client['phone']}</a></td>
    </tr>
  {/foreach}
</table>
