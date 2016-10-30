<div class="navbar menu">
	<ul>
		<?php
			$nav_query = "SELECT DISTINCT tipo
								FROM produto";
			$prod_types = pg_exec($conn, $nav_query);
			$nav_n_rows = pg_num_rows($prod_types);
			for($i=0; $i<$nav_n_rows; $i++) {
				$prod_type = pg_fetch_row($prod_types, $i);
				if(!empty($active_type)){
					if($active_type == $prod_type[0]) {
						echo '<li class="nav-active"><a href="../../pages/other/displayProdutos.php?menu=Produtos&type='.$prod_type[0].'">'.$prod_type[0].'</a></li>';
					}
					else {
						echo '<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&type='.$prod_type[0].'">'.$prod_type[0].'</a></li>';
					}
				}	else {
					echo '<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&type='.$prod_type[0].'">'.$prod_type[0].'</a></li>';
				}
			}
		?>
	</ul>
</div>