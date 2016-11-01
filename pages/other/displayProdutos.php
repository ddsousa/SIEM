<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	if(!empty($_GET['menu'])) {
		$active_menu = $_GET['menu'];
	}
	include_once("../../common/navbar.php");
	$base_query = "SELECT id, nome, preco
								 FROM produto";
	$query_add = "";
	if(!empty($_GET['type'])) {
		$active_type = $_GET['type'];
		$query_add = " WHERE tipo = '".$active_type."'";
	}

	include_once("../../common/sub_navbar.php");


	if(!empty($_GET['page_nr'])) {
		$page_nr = $_GET['page_nr'];
	}

	if(!empty($_GET['sort_by'])) {
		$query_add = $query_add." ORDER BY ".$_GET['sort_by'];
	}

	if(!empty($_POST['lower_lim']) && !empty($_POST['upper_lim'])) {
		$query_add = $query_add." WHERE preco>=".$_POST['lower_lim'].' AND preco<='.$_POST['upper_lim'];
	}

	$query = $base_query.$query_add.";";
	echo $query.'<br>';
	$prod_array = pg_exec($conn, $query);
?>

<script language="javascript">
	function sortProductsBy(sel) {
		var str_aux = "";
		// check if has type value
		<?php	if(!empty($_GET['type'])) { ?>
			var type = '<?php echo $_GET['type']; ?>';
			str_aux += "&type="+type;
		<?php } 
		if(!empty($_GET['menu'])) { ?>
			var menu = '<?php echo $_GET['menu']; ?>';
			str_aux += "&menu="+menu;
		<?php }
		if(!empty($_GET['page_nr'])) { ?>
			var page_nr = '<?php echo $_GET['page_nr']; ?>';
			str_aux += "&page_nr="+page_nr;
		<?php } ?>

		window.location.assign("displayProdutos.php?sort_by="+sel.value+str_aux);
	
	}
</script>

</div>
<div id="container">
		<?php
			if(empty($_GET['type'])) {
				include_once("../../common/display_mais_vendidos.php");
				echo '<hr>';
			}
		?>
		<h4 class="titulo-centrado">Todos os produtos</h4>
		<div style="margin-left: 5%;">
			<select class="dropbtn" onchange="sortProductsBy(this)">
				<option disabled selected>Ordenar</option>
			  <option value="preco asc">Preço mais baixo</option>
			  <option value="preco desc">Preço mais alto</option>
			  <option value="nome">Nome</option>
			</select>
		</div>

		<div style="margin-right: 5%; float: right; border: 1px solid red;">
			<?php
				$aux = "";
				if(!empty($_GET['page_nr'])) {
					if($_GET['page_nr'] == -1) {
						$page_nr = -1;
					} else {
						$page_nr = 1;
					}
					$aux = $aux."page_nr=".$page_nr;
				}
				if(!empty($_GET['type'])) {
					$aux = "&type=".$_GET['type'];
				}
				if(!empty($_GET['menu'])) {
					$aux = $aux."&menu=".$_GET['menu'];
				}
				if(!empty($_GET['sort_by'])) {
					$aux = $aux."&sort_by=".$_GET['sort_by'];
				}
			?>
			<form method="POST" action="displayProdutos.php?<?php echo $aux;?>">
			Preço de:
				<input type="text" class="text-input-small" name="lower_lim">
				até
				<input type="text" class="text-input-small" name="upper_lim">
				<input type="submit" value="Filtrar" class="btn-princ btn-large">
			</form>
		</div>

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