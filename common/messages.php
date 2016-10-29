<div id="error_messages">
  <?php
    if(isset($_SESSION['ERROR_MESSAGES'])) {
      $error_messages = $_SESSION['ERROR_MESSAGES'];
      foreach ($error_messages as $error) {
        echo '<div class="error">' . $error . '<a class="close" href="#">X</a></div>';
      }

      unset($_SESSION['ERROR_MESSAGES']);
    }

    if(isset($_SESSION['SUCCESS_MESSAGES'])) {
      $success_messages = $_SESSION['SUCCESS_MESSAGES'];
      foreach ($success_messages as $success) {
        echo '<div class="error">' . $success . '<a class="close" href="#">X</a></div>';
      }

      unset($_SESSION['SUCCESS_MESSAGES']);
    }
  ?>
</div>
