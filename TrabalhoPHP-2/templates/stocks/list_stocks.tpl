<h1>Stocks</h1>
<table class="tab-blue">
  <tr>
    <th>Código</th>
    <th>Nome do Produto</th>
    <th>Qt. Armazém</th>
    <th>Qt. Disponível</th>
  </tr>
  {foreach $stocks as $stock}
    <tr>
      <td><a href="{$BASE_URL}pages/products/details.php?id={$stock['prod_id']}">{$stock['code']}</a></td>
      <td><a href="{$BASE_URL}pages/products/details.php?id={$stock['prod_id']}">{$stock['name']}</a></td>
      <td>{$stock['qt_warehouse']}</td>
      <td>{$stock['qt_available']}</td>
    </tr>
  {/foreach}
</table>
