<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/product.php");

  if(!$_POST['nome'] || !$_POST['preco']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';

    header("Location: ../../pages/other/editProduct.php");
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

  $id = $_SESSION['EDIT_PRODUCT'];
  unset($_SESSION['EDIT_PRODUCT']);

  updateProduct($id, $codigo, $tipo, $_POST['nome'], $descricao, $_POST['preco']);

  // Alterar imagem
  // Verify that the image is valid
  $target_dir = "../../media/img/products/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;

    // Verify if the user uploaded a file
  if(file_exists($_FILES['fileToUpload']['tmp_name']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check == false) {
            $_SESSION['ERROR_MESSAGES'][] = "O ficheiro não é uma imagem.";
            header("Location: ../../pages/other/editProduct.php?id=" . $id);
            exit;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      $_SESSION['ERROR_MESSAGES'][] = "O tamanho da imagem é demasido grande. Por favor seleccione uma imagem com menos de 500KB...";
      header("Location: ../../pages/other/editProduct.php?id=" . $id);
      exit;
    }

    // Allow certain file formats
    if($imageFileType != "jpg") {
      $_SESSION['ERROR_MESSAGES'][] = "Apenas ficheiros JPG são permitidos.";
      header("Location: ../../pages/other/editProduct.php?id=" . $id);
      exit;
    }

    // Verify if the category is new
    if($_POST['tipo'] == 'adicionar') {
      $tipo = $_POST['nova_categoria'];
    } else {
      $tipo = $_POST['tipo'];
    }

    // Delete the existing image
    $image_file = "../../media/img/products/" . $id . ".jpg";
    unlink($image_file);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_file)) {
      $_SESSION['SUCCESS_MESSAGES'][] = "Upload da imagem com sucesso.";
      header("Location: ../../pages/other/editProduct.php?id=" . $id);
      exit;
    } else {
      $_SESSION['ERROR_MESSAGES'][] = "Ocorreu um erro: o produto foi editado mas não foi possível fazer o upload da imagem.";

      exit;
    }
  }

  $_SESSION['SUCCESS_MESSAGES'][] = 'Alterações efectuadas com sucesso!';
  header("Location: ../../pages/other/editProduct.php?id=" . $id);
  exit;
 ?>
