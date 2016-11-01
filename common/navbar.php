<div class="navbar menu">
  <ul style="width: 60%; border: 1px solid red; float: left;">
  	<?php
  		if(!empty($active_menu)) {
  			if($active_menu == 'Inicio') {
  				echo '<li class="nav-active"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>';
  			} else {
  				echo '<li class="nav-inactive"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>';
  			}

  			if($active_menu == 'Produtos') {
  				echo '<li class="nav-active"><a href="../../pages/other/displayProdutos.php?menu=Produtos&page_nr=1">Produtos</a></li>';
  			} else {
  				echo '<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&page_nr=1">Produtos</a></li>';
  			}

  		} else {
  			echo '<li class="nav-active"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>
    <li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&page_nr=1">Produtos</a></li>';
  		}
  	?>
   
  </ul>
  <!--<div class="search-bar">
    <img style="height: 20px; margin-top: 3px; float: right; margin-right: 3px;" src="../../media/img/icons/search_icon.png" alt="icon de pesquisa">
  </div>-->
  <div class="search-box">
    <form method="POST" action="displayProdutos.php?" style="display: inline-block;">
      <input type="text" class="search-bar" placeholder="Pesquisa">
      <div class="search-button-containter">
        <input type="submit" id="search-button" value="">
        <img src="../../media/img/icons/search_icon.png" alt="icon de pesquisa" id="search-icon">
      </div>
  </form>
  </div>
  
</div>
