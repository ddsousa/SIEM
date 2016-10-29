<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	include_once("../../common/navbar.php");

	$prod_id = $_GET['id'];

	$query = "SELECT *
						FROM produto
						WHERE id=".$prod_id.";";
	$result = pg_exec($conn, $query);
	$product = pg_fetch_row($result, 0);
?>
	</div>
	<div id="container">
		<div class="display-prod">
			<div class="display-prod-left">
				<?php
					echo '<img class="img-produto" src="../../media/img/products/'.$prod_id.'.jpg" alt="'.$product[2].'">';
				?>
			</div>		
			<div class="display-prod-right">
				<?php
					echo '<h4>'.$product[2].'</h4>';
					echo '<p>'.$product[5].'€/'.$product[6].'</p>';
					echo '<br>';
					echo '<p>'.$product[4].'</p>';
				?>
			</div>
			<div class="order">
				<form action="">
					<input style="width: 40px;" class="order-item" type="text" name="quantity" value="1">
					Unid.
					<input type="submit" value="+Adicionar ao carrinho" class="btn-princ order-item">
				</form>
			</div>
		</div>
	</div>
<?php
	include_once("../../common/footer.php");
?>
