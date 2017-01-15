<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'database/products.php');
  include_once($BASE_DIR.'database/stock.php');

  if(!$_POST['code'] || !$_POST['category'] || !$_POST['name'] || !$_POST['description'] || !$_POST['price']) {
    $_SESSION['error_messages'][] = 'Não foi possível adicionar um novo produto';
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $target_dir = $BASE_DIR."media/img/products/";

  // Verify if the user uploaded a file
  if(file_exists($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
    // Verify that the image is valid
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check == false) {
      $_SESSION['error_messages'][] = "O ficheiro não é uma imagem.";
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
      $_SESSION['error_messages'][] = "O tamanho da imagem é demasido grande. Por favor seleccione uma imagem com menos de 500KB...";
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    // Allow certain file formats
    if($imageFileType != "jpg") {
      $_SESSION['error_messages'][] = "Apenas ficheiros JPG são permitidos.";
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $no_image = 0;
  } else {
    $no_image = 1;
  }

  // Verify if the category is new
  if($_POST['category'] == 'add-new') {
    $type = $_POST['new-category'];
  }
  else {
    $type = $_POST['category'];
  }

  $code        = strip_tags($_POST['code']);
  $name        = strip_tags($_POST['name']);
  $description = strip_tags($_POST['description']);
  $price       = strip_tags($_POST['price']);

  $id_product = addNewProduct($code, $name, $type, $description, $price);
  newStock($id_product);

  // Add image
  $target_file = $target_dir . $id_product . ".jpg";

  if($no_image == 0) {
    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
      $_SESSION['success_messages'][] = "Upload da imagem com sucesso.";
      header("Location: ".$BASE_URL."pages/products/list_all.php");
      exit;
    }
    else {
      $_SESSION['error_messages'][] = "Ocorreu um erro: o produto foi criado mas não foi possível fazer o upload da imagem.";
      header("Location: ".$BASE_URL."pages/products/list_all.php");
      exit;
    }
  }
  else {
    // Let's copy the default image
    copy($BASE_DIR."/media/img/products/default.jpg", $target_file);

    $_SESSION['success_messages'][] = "Produto adicionado com sucesso.";
    header("Location: ".$BASE_URL."pages/products/list_all.php");
    exit;
  }
?>
