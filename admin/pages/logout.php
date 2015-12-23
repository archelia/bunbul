<?php
  ob_start();
  session_start();
  session_unset();
  session_destroy();
  echo "<script>";
  echo "window.location='../index.php'";
  echo "</script>";
  ob_flush();
?>