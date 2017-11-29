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
	<th>Start</th>
	<th>End</th>
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
<?php
if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"timeentry_view.php\">Enter Time</a><br>";
	echo "<a href=\"timereport_view.php\">My Time Report</a><br>";
	
	if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		echo "<a href=\"adminreport_view.php\">Organizational Time Report</a><br>";
    }
    
    echo "<a href=\"logout.php\">Logout</a><br>";
}
?>
 </body>
