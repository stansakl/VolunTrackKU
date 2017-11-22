<?php
session_start();
require "htmlconstants.php";
//namespace voluntrack;
//require '../vendor/autoload.php';
?>

 <!DOCTYPE html>
 <?php echo HEADER; ?>


 <body>
 <?php require "navbar.php"; ?>
	<div class="container">
	  <div class="panel panel-primary">
	  <div class="panel-heading">Time Report for <?php echo $_SESSION['user']; ?></div>
	  <div class="panel-body">
        <form action="usertimereport.php" method="POST">
		<input type="submit">
		</form>
	  </div>
	  </div>
	  </div>
	</div>
 </body>
