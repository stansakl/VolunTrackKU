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
        <form  action="" method="post">
		    <div class="form-group">
                <label for="project">Enter the project you worked on.</label>
				<input type="text" class="form-control input-lg" name="project"
                value="" placeholder="Project">
			</div>
            <div class="form-group">
                <label for="startdate">Enter the start date</label>
				<input type="date" class="form-control input-lg" name="startdate"><br>
                <label for="starttime">Enter the start time</label>
				<input type="time" class="form-control input-lg" name="starttime">
			</div>
            <div class="form-group">
                <label for="enddate">Enter the end date</label>
				<input type="date" class="form-control input-lg" name="enddate"><br>
                <label for="endtime">Enter the end time</label>
				<input type="time" class="form-control input-lg" name="endtime">
			</div>

             <button type="submit" class="btn btn-primary" name="timeentrybtn">Enter Time</button>
        </form>
	  </div>
	  </div>
	  </div>
	</div>
 </body>
