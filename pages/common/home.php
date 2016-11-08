<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/common/messages.php");
?>
	</html>
		<div id="container">
			<?php
				include_once("../../common/display_mais_vendidos.php");
			?>
			<hr>
			<div style="margin: 3% auto">
				<table class="tab-centrada">
					<tr>
						<td>
							<img class="membro-equipa" src="../../media/img/foto_david.png" alt="Fotografia de David de Sousa">
						</td>
						<td>
							<img class="membro-equipa" src="../../media/img/foto_relvas.jpg" alt="Fotografia de Pedro Relvas">
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
				<h4 class="titulo-centrado">Versão Final</h4>
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
			include_once("../../common/footer.php");
		?>
