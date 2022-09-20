<?
session_start();
unset($_SESSION['session_usuario']);
unset($_SESSION['mensaje']);
session_destroy();
header ("location:login.php");
?>