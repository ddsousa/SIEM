<html>
<head>
	<meta charset="UTF-8">
	<title>Oceano Hipermercado</title>
	<link rel="icon" href="media/icon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<div id="wrapper">
		<div id="header">
		<div style="height: 80px">
			<img src="media/logo.png" class="logo">
			<table class="tab-login" style="visibility: visible">
				<tr>
					<td>
						<input style="width: 150px;" type="email" placeholder="Email">
					</td>
					<td>
						<input style="width: 100px;" type="password" placeholder="Password">
					</td>
					<td>
						<input type="submit" value="Login" class="btn-princ">
					</td>
					<td>
						<input type="submit" value="Registrar" class="btn-princ">
					</td>
				</tr>
			</table>
			</div>
			<div class="navbar" menu">
				<ul>
					<li class="nav-element nav-active"><a href="#">Início</a></li>
					<li class="nav-element nav-inactive"><a href="#">Produtos</a></li>
				</ul>
			</div>
		</div>
		<div id="container">
			<h4 class="titulo-centrado">Produtos mais vendidos</h4>
			<div>
				<table class="tab-centrada">
					<tr> <!-- imagens produto -->
						<td>
							<img class="img-produto" src="media/temp.jpg" alt="fotografia produto"> <!-- Isto aqui era fixe que a tabela das imagens tivesse uma descricao do que e' o produto para meter no campo alt ;)-->
						</td>
						<td>
							<img class="img-produto" src="media/temp.jpg" alt="fotografia produto"> <!-- Isto aqui era fixe que a tabela das imagens tivesse uma descricao do que e' o produto para meter no campo alt ;)-->
						</td>
						<td>
							<img class="img-produto" src="media/temp.jpg" alt="fotografia produto"> <!-- Isto aqui era fixe que a tabela das imagens tivesse uma descricao do que e' o produto para meter no campo alt ;)-->
						</td>
						<td>
							<img class="img-produto" src="media/temp.jpg" alt="fotografia produto"> <!-- Isto aqui era fixe que a tabela das imagens tivesse uma descricao do que e' o produto para meter no campo alt ;)-->
						</td>
					</tr>
					<tr> <!-- nome e preco produto -->
						<td>
							<table class="tab-centrada texto-produtos">
								<tr>
									<td style="text-align: left;">David</td>
									<td style="text-align: right;">1.00€</td>
								</tr>
							</table>
						</td>
						<td>
							<table class="tab-centrada texto-produtos">
								<tr>
									<td style="text-align: left;">David</td>
									<td style="text-align: right;">1.00€</td>
								</tr>
							</table>
						</td>
						<td>
							<table class="tab-centrada texto-produtos">
								<tr>
									<td style="text-align: left;">David</td>
									<td style="text-align: right;">1.00€</td>
								</tr>
							</table>
						</td>
						<td>
							<table class="tab-centrada texto-produtos">
								<tr>
									<td style="text-align: left;">David</td> <!-- TODO - ver se nao ha maneira mais bonita de fazer isto -->
									<td style="text-align: right;">1.00€</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<hr>
			<div style="margin: 3% auto">
				<table class="tab-centrada">
					<tr>
						<td>
							<img class="membro-equipa" src="media/foto_david.png" alt="Fotografia de David de Sousa">
						</td>
						<td>
							<img class="membro-equipa" src="media/foto_relvas.jpg" alt="Fotografia de Pedro Relvas">
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
		<div id="footer" class="menu">
			<ul class="centered">
				<li class="with-separator"><a href=#>Contactos</a></li>
				<li><a href=#>Relatório</a></li>
			</ul>
		</div>
	</div>
</body>
</html>