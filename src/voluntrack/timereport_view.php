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
		<div class="form-group">
                <label for="project">Enter the project to report on.</label>
                <select name="project" class="form-control input-lg">
				    <option value="All">Report all projects</option>
                    <option value="Adoption Event">Adoption Event</option>
                    <option value="Clinic">Clinic</option>
                    <option value="Fundraising Event">Fundraising Event</option>
                    <option value="Grounds Maintainance">Grounds Maintenance</option>
                    <option value="Office Work">Office Work</option>
                    <option value="Socializtion">Socialization</option>
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
 </body>
