<?php
	include_once("common/init.php");
	include_once("common/header.php");
?>
		 <div class="navbar menu">
			 <ul>
				 <li class="nav-element nav-active"><a href="#">Início</a></li>
				 <li class="nav-element nav-inactive"><a href="#">Produtos</a></li>
			 </ul>
		 </div>
	 </div>
	 </html>
		<div id="container">
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
								echo 	'<img class="img-produto" src="media/img/products/'.$row[0].'.jpg" alt="fotografia de '.$row[1].'">';
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
								echo 		'<td style="text-align: left;"><a href="pages/displayProduto.php?id='.$row[0].'">'.$row[1].'</a></td>';
								echo 		'<td style="text-align: right;">'.$row[2].'€</td>';
								echo 	'</table>';
								echo '</td>';
							}
						?>
					</tr>
				</table>
			</div>
			<hr>
			<div style="margin: 3% auto">
				<table class="tab-centrada">
					<tr>
						<td>
							<img class="membro-equipa" src="media/img/foto_david.png" alt="Fotografia de David de Sousa">
						</td>
						<td>
							<img class="membro-equipa" src="media/img/foto_relvas.jpg" alt="Fotografia de Pedro Relvas">
						</td>
					</tr>
					<tr>
						<td>
							<a href="https://sigarra.up.pt/feup/pt/fest_geral.cursos_list?pv_num_unico=201203863" target="_blank">David de Sousa</a>
						</td>
						<td>
							<a href="https://sigarra.up.pt/feup/pt/fest_geral.cursos_list?pv_num_unico=201205118" target="_blank">Pedro Relvas</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="mailto:ee12183@fe.up.pt">ee12183@fe.up.pt</a>
						</td>
						<td>
							<a href="mailto:ee12036@fe.up.pt">ee12036@fe.up.pt</a>
						</td>
					</tr>
				</table>
			</div>
			<div>
				<h4 class="titulo-centrado">Versão Provisória</h4>
				<table class="tab-centrada-peq">
					<tr>
						<td>usersiem</td>
						<td>pass:qwerty</td>
					</tr>
					<tr>
						<td>adminsiem</td>
						<td>pass:12345</td>
					</tr>
				</table>
			</div>
		</div>
		<?php
			include_once("common/disconnect_db.php");
			include_once("common/footer.php");
		?>
