<?php
session_start();
require_once "htmlconstants.php";
//namespace voluntrack;
//require '../vendor/autoload.php';
?>

 <!DOCTYPE html>
 <?php echo HEADER; ?>


 <body>
 <?php
 require "navbar.php";       
 ?>
	<div class="container">
	  <div class="panel panel-primary">
	  <div class="panel-heading">Time Report for <?php echo $_SESSION['user']; ?></div>
	  <div class="panel-body">
        <form action="usertimereport.php" method="POST">
		<div class="form-group">
                <label for="project">Enter the project to report on.</label>
                <select name="project" class="form-control input-lg">
				    <option value="All">Report all projects</option>
                    <option value="Adoption Event">Adoption Event</option>
                    <option value="Clinic">Clinic</option>
                    <option value="Fundraising Event">Fundraising Event</option>
                    <option value="Grounds Maintainance">Grounds Maintenance</option>
                    <option value="Office Work">Office Work</option>
                    <option value="Socialization">Socialization</option>
                </select>
			</div>
			<div class="form-group">
                <label for="startdate">Enter the start date for the report.</label>
				<input type='date' name='startdate'>                
			</div>
			<div class="form-group">
                <label for="enddate">Enter the end date for the report.</label>
				<input type='date' name='enddate'>                
			</div>
            <div class="form-group">
		<input type="submit">
		</form>
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
