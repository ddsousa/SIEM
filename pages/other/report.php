<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
?>

  <div id="container">

    <h3 class="page-title">Relatório</h3>

    <p><br>Este trabalho foi desenvolvido no âmbito da unidade curricula de Sistemas de Informação Empresariais.<br>
        Abaixo poderá descarregar os seguintes recursos.<br><br></p>

       <!-- <table>
          <tr><td><a href="#"><input style="width: 150px;" type="button" value="PPT"></input></a></td></tr>
          <tr><td><a href="#"><input style="width: 150px;" type="button" value="ZIP"></input></a></td></tr>
          <tr><td><a href="#"><input style="width: 150px;" type="button" value="CSS"></input></a></td></tr>
        </table> -->
        
        <table class="tab-icons tab-centrada">
            <tr>
              <td><a href="#"><img class="icon" src="../../media/img/icons/icon_powerpoint.png" alt="Logótipo Microsoft PowerPoint"></a></td>
              <td><a href="#"><img class="icon" src="../../media/img/icons/icon_css.png" alt="Logótipo CSS3"></a></td>
              <td><a href="#"><img class="icon" src="../../media/img/icons/icon_zip.png" alt="Icon de ZIP"></a></td>
            </tr>
          </table>
  </div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
