<div class="navbar menu">
  <ul>
  	<?php
  		if(!empty($active_menu)) {
  			if($active_menu == 'Inicio') {
  				echo '<li class="nav-active"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>';
  			} else {
  				echo '<li class="nav-inactive"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>';
  			}

  			if($active_menu == 'Produtos') {
  				echo '<li class="nav-active"><a href="../../pages/other/displayProdutos.php?menu=Produtos">Produtos</a></li>';
  			} else {
  				echo '<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos">Produtos</a></li>';
  			}

  		} else {
  			echo '<li class="nav-active"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>
    <li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos">Produtos</a></li>';
  		}
  	?>
   
  </ul>
</div>
