<div id="error_messages">
  <?php
    if(isset($_SESSION['ERROR_MESSAGES'])) {
      $error_messages = $_SESSION['ERROR_MESSAGES'];
      foreach ($error_messages as $error) {
        echo $error;
      }

      unset($_SESSION['ERROR_MESSAGES']);
    }
    ?>
</div>
<div id="success_messages">
  <?php
    if(isset($_SESSION['SUCCESS_MESSAGES'])) {
      $success_messages = $_SESSION['SUCCESS_MESSAGES'];
      foreach ($success_messages as $success) {
        echo $success;
      }

      unset($_SESSION['SUCCESS_MESSAGES']);
    }
  ?>
</div>
