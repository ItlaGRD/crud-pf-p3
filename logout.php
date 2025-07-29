<?php
  session_start();
  session_destroy();
  header("Location: index.php"); // Asegúrate que tu archivo de login se llama así
  exit();
?>
