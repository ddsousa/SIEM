<?php
	include_once($BASE_DIR."/database/product.php");
?>

<div class="navbar sub-navbar menu">
	<ul>
		<?php
			if(!empty($_GET['type'])) {
				$type = $_GET['type'];
			} else {
				$type = null;
			}
			$prod_types_array = searchPrductsTypes();
			$nav_n_rows = sizeof($prod_types_array);
			for($i=0; $i<$nav_n_rows; $i++) {
				$prod_type = $prod_types_array[$i];
				if(!empty($type)){
					if($type == $prod_type['tipo']) {
						echo '<li class="nav-active"><a href="../../pages/other/displayProdutos.php?menu=Produtos&type='.$prod_type['tipo'].'&page_nr=1">'.$prod_type['tipo'].'</a></li>';
					}
					else {
						echo '<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&type='.$prod_type['tipo'].'&page_nr=1">'.$prod_type['tipo'].'</a></li>';
					}
				}	else {
					echo '<li class="nav-inactive"><a href="../../pages/other/displayProdutos.php?menu=Produtos&type='.$prod_type['tipo'].'&page_nr=1">'.$prod_type['tipo'].'</a></li>';
				}
			}
		?>
	</ul>
</div>