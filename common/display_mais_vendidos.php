<h4 class="titulo-centrado">Produtos mais vendidos</h4>
<div>
	<table class="tab-centrada">
		<tr>
			<?php
				$query = "SELECT id, nome, preco
						  FROM produto
						  ORDER BY n_vendas DESC, nome";
				$result = pg_exec($conn, $query);

				for($i=0; $i<4; $i++) { // imagens produto
					$row = pg_fetch_row($result, $i);
					echo '<td>';
					echo 	'<img class="img-produto" src="../../media/img/products/'.$row[0].'.jpg" alt="fotografia de '.$row[1].'">';
					echo '</td>';
				}

				echo '</tr>';
				echo '<tr>';

				for($i=0; $i<4; $i++) { // nome e preco
					$row = pg_fetch_row($result, $i);
					echo '<td>';
					echo 	'<table class="tab-centrada texto-produtos">';
					//echo 		'<td style="text-align: left;">1</td>';
					//echo 		'<td style="text-align: right;">2</td>';
					echo 		'<td style="text-align: left;"><a href="../../pages/other/displayProduto.php?id='.$row[0].'">'.$row[1].'</a></td>';
					echo 		'<td style="text-align: right;">'.$row[2].'€</td>';
					echo 	'</table>';
					echo '</td>';
				}
			?>
		</tr>
	</table>
</div>