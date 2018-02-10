<?php
session_start();
require "htmlconstants.php";

?>

 <!DOCTYPE html>
 <?php echo HEADER; ?>


 <body>
 <?php require "navbar.php"; ?>
	<div class="container">
	  <div class="panel panel-primary">
	  <div class="panel-heading">Time Entry</div>
	  <div class="panel-body">
        <form  action="timeentry_controller.php" method="post">
		   <div class="form-group">
                <label for="project">Enter the project you worked on.</label>
                <select name="project" class="form-control input-lg">
                    <option value="Adoption Event">Adoption Event</option>
                    <option value="Clinic">Clinic</option>
                    <option value="Fundraising Event">Fundraising Event</option>
                    <option value="Grounds Maintainance">Grounds Maintenance</option>
                    <option value="Office Work">Office Work</option>
                    <option value="Socialization" selected>Socialization</option>
                </select>
			</div>
            <div class="form-group">
                <label for="projectdate">Enter the date.</label>
				<input type="date" class="form-control input-lg" name="projectdate" required><br>
                <label for="starttime">Enter the start time.</label>
				<input type="time" class="form-control input-lg" name="starttime" required>
			</div>
            <div class="form-group">
                <label for="endtime">Enter the end time.</label>
				<input type="time" class="form-control input-lg" name="endtime"required>
			</div>

             <button type="submit" class="btn btn-primary" name="timeentrybtn">Enter Time</button>
        </form>
	  </div>
	  </div>
	  </div>
	</div>
    <?php
/*
if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"timeentry_view.php\">Enter Time</a><br>";
	echo "<a href=\"timereport_view.php\">My Time Report</a><br>";
	
	if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		echo "<a href=\"adminreport_view.php\">Organizational Time Report</a><br>";
    }
    
    echo "<a href=\"logout.php\">Logout</a><br>";
}*/
?>
 </body>
