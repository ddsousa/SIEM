<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/database/product.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/common/sub_navbar.php");


	if(!empty($_GET['page_nr'])) {
		$page_nr = $_GET['page_nr'];
	}

	if(!empty($_GET['sort_by'])) {
		$sort_by = $_GET['sort_by'];
	} else {
		$sort_by = null;
	}

	if(!empty($_POST['lower_lim']) && !empty($_POST['upper_lim'])) {
		$lower_lim = $_POST['lower_lim'];
		$upper_lim = $_POST['upper_lim'];
	} else {
		$lower_lim = null;
		$upper_lim = null;
	}

	if(!empty($_POST['search'])) {
		$prod_array = searchProductByName($_POST['search']); // ignores previous restrictions
	} else {
		$prod_array = searchProduct($type, $sort_by, $lower_lim, $upper_lim);
	}

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

<div id="container">
		<?php
			if($_SESSION['PERMISSIONS'] == 1) {
				echo '<a href="../../pages/other/addProduct.php"><input type="button" value="Adicionar novo produto" class="btn-princ"></input></a>';
			}
			if(empty($_GET['type'])) {
				include_once("../../common/display_mais_vendidos.php");
				echo '<hr>';
			}
		?>
		<h4 class="titulo-centrado">Todos os produtos</h4>
		<div style="margin-left: 5%;">
			<select class="dropbtn" onchange="sortProductsBy(this)">
				<option disabled selected>Ordenar</option>
				<?php if($selected == "preco asc") { ?>
			  <option value="preco asc" selected>Preço mais baixo</option>
			  <?php } else { ?>
			  <option value="preco asc">Preço mais baixo</option>
			  <?php } if($selected == "preco desc") { ?>
			  <option value="preco desc" selected>Preço mais alto</option>
			  <?php } else { ?>
			  <option value="preco desc">Preço mais alto</option>
			  <?php } if($selected == "nome") { ?>
			  <option value="nome" selected>Nome</option>
			  <?php } else { ?>
			  <option value="nome">Nome</option>
			  <?php } ?>
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
					$n_rows = sizeof($prod_array);
					if(!empty($page_nr)) {
						for($j=0; $j<$n_rows; $j+=4) {
							if($j<$page_nr*8 && $j>=($page_nr-1)*8 || $page_nr==-1) {
								echo '<tr>';
								for($i=0; $i<4; $i++) {	// imagens produtos
									echo '<td>';
									if(($i+$j)<$n_rows) {
										$prod = $prod_array[$i+$j];
										echo 	'<img class="img-produto" src="../../media/img/products/'.$prod['id'].'.jpg" alt="fotografia de '.$prod['nome'].'">';
									}
									echo '</td>';
								}
								echo '</tr>';
								echo '<tr>';
								for($i=0; $i<4; $i++) { // nome e preco
								echo '<td>';
								if(($i+$j)<$n_rows) {
									$prod = $prod_array[$i+$j];
									echo 	'<table class="tab-centrada texto-produtos">';
									echo 		'<td style="text-align: left;"><a href="../../pages/other/displayProduto.php?id='.$prod['id'].'">'.$prod['nome'].'</a></td>';
									echo 		'<td style="text-align: right;">'.$prod['preco'].'€/'.$prod['preco_por'].'</td>';
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
	include_once($BASE_DIR."/common/footer.php");
?>
