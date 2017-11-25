<?php
session_start();
require_once "htmlconstants.php";
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
      $user = $_SESSION['user'];
      $project = $_POST['project'];
      $start = $_POST['startdate'];
      $end = $_POST['enddate'];
      $time_result = "";

      if($project == "All") {
        $time_result = $dbm->report_time_for_user($user, 
        $start, 
        $end
      ); 

      }else {
        $time_result = $dbm->report_time_for_user_by_project($user, 
        $start, 
        $end,
        $project); 
      }
      
      ?>
    <table class="table table-striped">
      <?php
      echo $time_result;
      ?>
      </table>
      <?php
     // var_dump($_POST);
      ?>
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
