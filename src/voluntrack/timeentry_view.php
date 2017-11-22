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
	  <div class="panel-heading">Time Entry</div>
	  <div class="panel-body">
        <form  action="timeentry.php" method="post">
		   <div class="form-group">
                <label for="project">Enter the project you worked on.</label>
                <select name="project" class="form-control input-lg">
                    <option value="Adoption Event">Adoption Event</option>
                    <option value="Clinic">Clinic</option>
                    <option value="Fundraising Event">Fundraising Event</option>
                    <option value="Grounds Maintainance">Grounds Maintenance</option>
                    <option value="Office Work">Office Work</option>
                    <option value="Socializtion" selected>Socialization</option>
                </select>
			</div>
            <div class="form-group">
            <!--
                <label for="startdate">Enter the start date.</label>
				<input type="date" class="form-control input-lg" name="startdate"><br>
                -->
                <label for="projectdate">Enter the date.</label>
				<input type="date" class="form-control input-lg" name="projectdate" required><br>
                <label for="starttime">Enter the start time.</label>
				<input type="time" class="form-control input-lg" name="starttime" required>
			</div>
            <div class="form-group">
            <!--
                <label for="enddate">Enter the end date.</label>
				<input type="date" class="form-control input-lg" name="enddate"><br>
                -->
                <label for="endtime">Enter the end time.</label>
				<input type="time" class="form-control input-lg" name="endtime"required>
			</div>

             <button type="submit" class="btn btn-primary" name="timeentrybtn">Enter Time</button>
        </form>
	  </div>
	  </div>
	  </div>
	</div>
 </body>
