<h1>Detalhes de encomenda</h1>

<table class="tab-details">
  <tr>
    <th>Nome do Cliente:</th>
    <td>{$order['name']}</td>
  </tr>
  <tr>
    <th>Número da Encomenda:</th>
    <td>{$order['num']}</td>
  </tr>
  <tr>
    <th>Estado:</th>
    {if $PERMISSIONS eq 1}
      <td>
        <form id="form-edit-state" action="{$BASE_URL}actions/orders/editState.php?id={$order['order_id']}" method="POST">
          <select name="state" class="dropdown">
            <option value="Pendente" {if $order['state'] eq 'Pendente'}selected{/if}>Pendente</option>
            <option value="Enviada" {if $order['state'] eq 'Enviada'}selected{/if}>Enviada</option>
            <option value="Entregue" {if $order['state'] eq 'Entregue'}selected{/if}>Entregue</option>
          </select>
        </form>
      </td>
    {else}
      <td>{$order['state']}</td>
    {/if}
  </tr>
  <tr>
    <th>Data:</th>
    <td>{$order['order_date']|date_format:$config.date_time}</td>
  </tr>
  <tr>
    <th>Número de Artigos:</th>
    <td>{$order['num_products']}</td>
  </tr>
  <tr>
    <th>Preço Total:</th>
    <td>{$order['total_price']}€</td>
  </tr>
  <tr>
    <th></th>
    <td>
      <button type="submit" class="btn-princ" form="form-edit-state">Editar</button>
    </td>
  </tr>
</table>
