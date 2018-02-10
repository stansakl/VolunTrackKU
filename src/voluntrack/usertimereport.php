<?php
/*
The MIT License (MIT)

Copyright (c) 2017 CodeHawk810

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
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
	  <div class="panel-heading">
      Time Report for <?php echo $_SESSION['user']; ?> for 
      <?php echo $_POST['startdate']; ?> through <?php echo $_POST['enddate'];?>
    </div>
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
