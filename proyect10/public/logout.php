<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['id']);
session_destroy();
print "<script>window.location='./login.php';</script>";
?>
