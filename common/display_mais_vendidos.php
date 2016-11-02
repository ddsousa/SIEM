<h4 class="titulo-centrado">Produtos mais vendidos</h4>
<div>
	<table class="tab-centrada">
		<tr>
			<?php
				$prod_array = searchMostSold();

				for($i=0; $i<4; $i++) { // imagens produto
					$prod = $prod_array[$i];
					echo '<td>';
					echo 	'<img class="img-produto" src="../../media/img/products/'.$prod['id'].'.jpg" alt="fotografia de '.$prod['nome'].'">';
					echo '</td>';
				}

				echo '</tr>';
				echo '<tr>';

				for($i=0; $i<4; $i++) { // nome e preco
					$prod = $prod_array[$i];
					echo '<td>';
					echo 	'<table class="tab-centrada texto-produtos">';
					echo 		'<td style="text-align: left;"><a href="../../pages/other/displayProduto.php?id='.$prod['id'].'">'.$prod['nome'].'</a></td>';
					echo 		'<td style="text-align: right;">'.$prod['preco'].'€/'.$prod['preco_por'].'</td>';
					echo 	'</table>';
					echo '</td>';
				}
			?>
		</tr>
	</table>
</div>