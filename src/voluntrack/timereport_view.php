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
	  <div class="panel-heading">Time Report for <?php $_SESSION['user'] ?></div>
	  <div class="panel-body">
        
	  </div>
	  </div>
	  </div>
	</div>
 </body>
