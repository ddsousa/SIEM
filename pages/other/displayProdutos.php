<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	if(!empty($_GET['menu'])) {
		$active_menu = $_GET['menu'];
	}
	include_once("../../common/navbar.php");
	if(!empty($_GET['type'])) {
		$active_type = $_GET['type'];
		$query = "SELECT id, nome, preco
							FROM produto
							WHERE tipo = '".$active_type."';";
	} else {
		$query = "SELECT id, nome, preco
							FROM produto";
	}
	include_once("../../common/sub_navbar.php");

	$prod_array = pg_exec($conn, $query);

	if(!empty($_GET['page_nr'])) {
		$page_nr = $_GET['page_nr'];
	}
?>

</div>
<div id="container">
		<?php
			include_once("../../common/display_mais_vendidos.php");
		?>
		<hr>
		<h4 class="titulo-centrado">Todos os produtos</h4>
		<table class="tab-centrada">
				<?php
					$n_rows = pg_num_rows($prod_array);
					if(!empty($page_nr)) {
						for($j=0; $j<$n_rows; $j+=4) {
							if($j<$page_nr*8 && $j>=($page_nr-1)*8 || $page_nr==-1) {
								echo '<tr>';
								for($i=0; $i<4; $i++) {	// imagens produtos
									echo '<td>';
									if(($i+$j)<$n_rows) {
										$prod = pg_fetch_row($prod_array, $i+$j);
										echo 	'<img class="img-produto" src="../../media/img/products/'.$prod[0].'.jpg" alt="fotografia de '.$prod[1].'">';
									}
									echo '</td>';
								}
								echo '</tr>';
								echo '<tr>';
								for($i=0; $i<4; $i++) { // nome e preco
								echo '<td>';
								if(($i+$j)<$n_rows) {
									$prod = pg_fetch_row($prod_array, $i+$j);
									echo 	'<table class="tab-centrada texto-produtos">';
									echo 		'<td style="text-align: left;"><a href="../../pages/other/displayProduto.php?id='.$prod[0].'">'.$prod[1].'</a></td>';
									echo 		'<td style="text-align: right;">'.$prod[2].'€</td>';
									echo 	'</table>';
								}
								echo '</td>';
							}
							echo '</tr>';
							}
						}
					}
				?>
				</div>	
	</table>
	<div style="border: 1px solid red;">
	<ul>
		<?php
			$n_pages = ceil($n_rows/8);
			for($i=1; $i<=$n_pages; $i++) {
				if(!empty($active_type)) {
					echo '<li class="page-nr"><a href="../../pages/other/displayProdutos.php?type='.$active_type.'&page_nr='.$i.'">'.$i.'</a></li>';
				} else {
					echo '<li class="page-nr"><a href="../../pages/other/displayProdutos.php?page_nr='.$i.'">'.$i.'</a></li>';
				}
			}
			if(!empty($active_type)) {
				echo '<li class="page-nr" style="width: 40px;"><a href="../../pages/other/displayProdutos.php?type='.$active_type.'&page_nr=-1">Todas</a></li>';
			} else {
				echo '<li class="page-nr" style="width: 40px;"><a href="../../pages/other/displayProdutos.php?page_nr=-1">Todas</a></li>';
			}
		?>
		</ul>
</div>
</div>

<?php
	include_once("../../common/footer.php");
?>