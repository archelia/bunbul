<?php
  session_start();
  session_unset();
  session_destroy();
  /*
  ob_start();
  ob_flush();
  */
  header("location: login.php");
?>