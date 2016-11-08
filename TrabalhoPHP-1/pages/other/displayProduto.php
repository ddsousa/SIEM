<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/database/product.php");

	$product = searchProductById($_GET['id']);
?>

	<div id="container">
		<div class="display-prod">
			<div class="display-prod-left">
				<img class="img-produto" src="../../media/img/products/<?=$_GET['id']?>.jpg" alt="<?=$product[2]?>">
			</div>
			<div class="display-prod-right">
					<h4><?=$product[2]?></h4>
					<p><?=$product[5]?>€/un</p>
					<br>
					<p><?=$product[4]?></p>
			</div>
			<?php
				if(isset($_SESSION['PERMISSIONS'])) {
			  	if($_SESSION['PERMISSIONS'] == 0) { ?>
			<div class="order">
				<form method="POST" action="../../actions/products/cartHandler.php?action=add&id=<?php echo $_GET['id'];?> ">
					<input class="text-input-small" type="text" name="quantity" value="1">
					Unid.
					<input type="submit" value="+Adicionar ao carrinho" class="btn-princ btn-large">
				</form>
			</div>
			<?php
				}
					}
			 ?>
		</div>
	</div>
<?php
	include_once("../../common/footer.php");
?>
