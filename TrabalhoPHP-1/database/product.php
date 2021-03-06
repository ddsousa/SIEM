<?php
	function searchProductById($id) {
		global $conn;

		$result = pg_query($conn, "SELECT *
															FROM produto
															WHERE id=$id;");

		if(!$result) {
			echo "An error occured.\n";
      exit;
		}

		return pg_fetch_row($result, 0);
	}

	function searchProductByName($name) {
		global $conn;

		$result = pg_query($conn, "SELECT id, nome, preco
								 	 						FROM produto
															WHERE nome LIKE '%$name%';");

		if(!$result) {
			echo "An error occured.\n";
      exit;
		}

		return pg_fetch_all($result); // array
	}

	function searchProduct($type, $sort_by, $lower_lim, $upper_lim) {
		global $conn;
		$base_query = "SELECT id, nome, preco
								 	 FROM produto";

		$add_query = "";

		if($type!=null) {
			$add_query = "$add_query WHERE tipo='$type'";
		}
		if($lower_lim!=null && $upper_lim!=null) {
			if($type==null) {	
				$add_query = "$add_query WHERE preco >= $lower_lim AND preco <= $upper_lim";
			} else {
				$add_query = "$add_query AND preco >= $lower_lim AND preco <= $upper_lim";
			}
		}
		if($sort_by!=null) {
			$add_query = "$add_query ORDER BY $sort_by";
		}

		$result = pg_query($conn, "$base_query $add_query;");
		if(!$result){
			echo "An error occured.\n";
      exit;
		}

		return pg_fetch_all($result); // array
	}

	function searchMostSold() {
		global $conn;

		$result = pg_query($conn, "SELECT id, nome, preco
															FROM produto
															ORDER BY n_vendas DESC, nome;");
		if(!$result) {
			echo "An error occured.\n";
      exit;
		}

		return pg_fetch_all($result); // array
	}

	function searchPrductsTypes() {
		global $conn;

		$result = pg_query($conn, "SELECT DISTINCT tipo
															FROM produto;");
		if(!$result) {
			echo "An error occured.\n";
      exit;
		}

		return pg_fetch_all($result); // array
	}

	function getCategories() {
		global $conn;

    $result = pg_query($conn, "SELECT DISTINCT tipo
															 FROM produto;");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return pg_fetch_all($result);
	}

	function addProduct($codigo, $nome, $tipo, $descricao, $preco) {
		global $conn;

		$nome = "'" . $nome . "'";
		$tipo = "'" . $tipo . "'";

		$query = "INSERT INTO produto
                               VALUES ( default,
                                      	$codigo,
                                      	$nome,
                                      	$tipo,
                                      	$descricao,
																				$preco,
																				0 )
                               RETURNING id;";

															 	echo $query;

    $result = pg_query($conn, $query);
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    $id = pg_fetch_row($result, 0);
    $id = $id[0];
    return $id;
	}

	function getProduct($id) {
    global $conn;
    $result = pg_query($conn, "SELECT *
                               FROM produto
                               WHERE id = $id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) == 0) return -1;
    else {
      $result = pg_fetch_assoc($result, 0);

      return $result;
    }
  }

	function updateProduct($id, $code, $category, $name, $description, $price) {
		global $conn;

		$name = "'" . $name . "'";
		$category = "'" . $category . "'";

    $result = pg_query($conn, "UPDATE produto
                               SET    codigo=$code, nome=$name, tipo=$category, descricao=$description, preco=$price
                               WHERE  id=$id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) == 0) return -1;
    else return 0;
	}

	function deleteProduct($id) {
		global $conn;

    $result = pg_query($conn, "DELETE FROM produto
                               WHERE id = $id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
	}
?>
