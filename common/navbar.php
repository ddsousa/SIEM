<div class="navbar menu">
  <ul>
  	<?php
  		if(!empty($active_menu)) {
  			if($active_menu == 'Inicio') { ?>
  				<li class="nav-active"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>
  			<?php } else { ?>
  				<li class="nav-inactive"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>
  			<?php }

  			if($active_menu == 'Produtos') { ?>
  				<li class="nav-active"><a href="../../pages/other/displayProdutos.php?menu=Produtos&page_nr=1">Produtos</a></li>
  			<?php } else { ?>
  				<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&page_nr=1">Produtos</a></li>
  			<?php }

  		} else { ?>
  			<li class="nav-active"><a href="../../pages/common/home.php?menu=Inicio">Início</a></li>
        <li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&page_nr=1">Produtos</a></li>
  		<?php } ?>
   
  </ul>
</div>
