<?
session_start();
if(!isset($_SESSION["session_usuario"])){
    header ("location:login.php");}
 else {
    

?>

<?php include ("includes/header.php");?>

<?php echo $_SESSION['session_username'];?>

<?php include ("includes/footer.php");?>}

<?php
}
?>

