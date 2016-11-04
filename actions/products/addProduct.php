<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");
  include_once ($BASE_DIR . "/database/product.php");

  // Data verification
  if (!$_POST['nome'] || !$_POST['preco']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
    header("Location: ../../pages/other/addProduct.php");
    exit;
  }

  // Verify that the image is valid
  $target_dir = "../../media/img/products/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  echo "<br><br>Target file:" . $target_file . ".<br>";
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check == false) {
          $_SESSION['ERROR_MESSAGES'][] = "O ficheiro não é uma imagem.";
          header("Location: ../../pages/other/addProduct.php");
          exit;
      }
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['ERROR_MESSAGES'][] = "O tamanho da imagem é demasido grande. Por favor seleccione uma imagem com menos de 500KB...";
    header("Location: ../../pages/other/addProduct.php");
    exit;
  }

  // Allow certain file formats
  if($imageFileType != "jpg") {
    $_SESSION['ERROR_MESSAGES'][] = "Apenas ficheiros JPG são permitidos.";
    header("Location: ../../pages/other/addProduct.php");
    exit;
  }

  // Verify if the category is new
  if($_POST['tipo'] == 'adicionar') {
    $tipo = $_POST['nova_categoria'];
  } else {
    $tipo = $_POST['tipo'];
  }

  $codigo = $_POST['codigo'];
  $descricao = $_POST['descricao'];

  strlen($codigo) == 0 ? $codigo = "NULL" : $codigo = "'" . $codigo . "'";
  strlen($descricao) == 0 ? $descricao = "NULL" : $descricao = "'" . $descricao . "'";

  $id_product = addProduct($codigo, $_POST['nome'], $tipo, $descricao, $_POST['preco']);

  $target_file = $target_dir . $id_product . ".jpg";

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $_SESSION['SUCCESS_MESSAGES'][] = "Upload da imagem com sucesso.";
    header("Location: ../../pages/other/displayProdutos.php");
    exit;
  } else {
    $_SESSION['ERROR_MESSAGES'][] = "Ocorreu um erro: o produto foi criado mas não foi possível fazer o upload da imagem.";
    header("Location: ../../pages/other/displayProdutos.php");
    exit;
  }
?>
