<?php
session_start();
require "htmlconstants.php";
require "DBManager.php";
use voluntrack\DBManager;
//namespace voluntrack;
//require '../vendor/autoload.php';
?>

 <!DOCTYPE html>
 <?php echo HEADER; ?>


 <body>
 <?php require "navbar.php"; ?>
	<div class="container">
	  <div class="panel panel-primary">
	  <div class="panel-heading">Organizational Time Report</div>
	  <div class="panel-body">
<?php 
$dbm = DBManager::get_instance();

$reportHTML = $dbm->report_time_for_all_users();
?>
<table class="table table-striped table-hover">
<tr>
	<th>First</th>
	<th>Middle</th>
	<th>Last</th>
	<th>Project</th>
	<th>Hours</th>
</tr>

<?php 
echo $reportHTML;
?>
</table>
	  </div>
	  </div>
	  </div>
	</div>
 </body>
