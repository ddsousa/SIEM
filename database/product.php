// Don't forget to close the connection!
//pg_close($conn);

<?php
	function searchProductByName($name) {
		global $conn;

		$result = pg_exec($conn, "SELECT id, nome, preco
								 	 						FROM produto 
															WHERE nome LIKE '%$name%';");

		if(!$result){
			echo "An error occured.\n";
      exit;
		}

		return $result;
	}

	function searchProduct($type, $sort_by, $lower_lim, $upper_lim) {
		global $conn;
		$base_query = "SELECT id, nome, preco
								 	 FROM produto";

		$add_query = "";

		if($type!=null) {
			$add_query = "$add_query WHERE tipo=$type";
		}
		if($sort_by!=null) {
			$add_query = "$add_query ORDER BY $sort_by";
		}
		if($lower_lim!=null && $upper_lim!=null) {
			$add_query = "$add_query WHERE preco >= $lower_lim AND preco <= $upper_lim";
		}
		echo "$base_query $add_query;";
		$result = pg_exec($conn, "$base_query $add_query;");
		if(!$result){
			echo "An error occured.\n";
      exit;
		}

		return $result;
	}
?>