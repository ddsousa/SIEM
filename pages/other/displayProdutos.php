<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	include_once("../../common/navbar.php");

	$query = "SELECT id, nome, preco
						FROM produto";
	$prod_array = pg_exec($conn, $query);
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
					for($j=0; $j<$n_rows; $j+=4) {
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
				?>	
	</table>
</div>

<?php
	include_once("../../common/footer.php");
?>