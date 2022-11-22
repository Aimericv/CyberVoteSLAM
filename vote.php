<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}
?>


  <h1>Hello, world!</h1>


  <?php
include("./assets/includes/footer.php");
?>