<?php
session_start();
require "htmlconstants.php";
require "DBManager.php";
use voluntrack\DBManager;
?>


 <!DOCTYPE html>
 <?php echo HEADER; ?>


 <body>
 <?php require "navbar.php"; ?>
	<div class="container">
	  <div class="panel panel-primary">
	  <div class="panel-heading">Time Report for <?php echo $_SESSION['user']; ?></div>
	  <div class="panel-body">
      <?php 
      $dbm = DBManager::get_instance();      
      $time_result = $dbm->report_time_for_user_by_project( $_SESSION['user'], $_POST['startdate'], $_POST['enddate'], $_POST['project']); 
      ?>
    <table class="table table-striped">
      <?php
      echo $time_result;
      ?>
      </table>
      <?php
      var_dump($_POST);
      ?>
	  </div>
	  </div>
	  </div>
	</div>
 </body>
