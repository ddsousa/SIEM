<section id="products">
  <h3 class="page-title">Edite os dados de cliente</h3>
  <form method="POST" name="upadate_user_form" action="../../actions/clients/updateDetails.php">
  <table class="tab-register">
  <tr>
    <td align="right">Nome</td>
    <td><input type="text" name="nome" value="{$client_data.name}"></input></td>
  </tr>
  <tr>
    <td align="right">Morada</td>
    <td><input type="text" name="morada" value="{$client_data.address}"></input></td>
  </tr>
  <tr>
    <td align="right">Código postal</td>
    <td>
      <table class="tab-zipcode">
        <tr>
          <td><input type="text" name="codigopostal1" maxlength="4" value="{$client_data.zipcode1}" style="width: 85px;"></input></td>
          <td>-</td>
          <td><input type="text" name="codigopostal2" maxlength="3" value="{$client_data.zipcode2}" style="width: 70px;"></input></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td align="right">Email</td>
    <td><input type="email" name="email" value="{$client_data.email}"></input></td>
  </tr>
  <tr>
    <td align="right">Telefone</td>
    <td><input class="medium" type="text" name="telefone" value="{$client_data.phone}" maxlength="9"></input></td>
  </tr>
<!-- -->
<tr>
<td align="right">Username</td>
<td><input class="medium" type="text" name="username" value="WHERES MY USERNAME??" disabled=""></input></td>
</tr>
<tr>
<td align="right">Password</td>
<td><input class="medium" type="password" name="password"></input></td>
</tr>
<tr>
  <td></td>
  <td><input type="submit" class="btn-princ" value="GUARDAR"></td>
</tr>
</table>

</form>
</section>
