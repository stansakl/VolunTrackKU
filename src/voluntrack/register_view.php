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
	  <div class="panel-heading">Register</div>
	  <div class="panel-body">
        <form  action="register.php" method="post">
		    <div class="form-group">
				<input type="text" class="form-control input-lg" name="firstname" value="" placeholder="First Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" name="middlename" value="" placeholder="Middle Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" name="lastname" value="" placeholder="Last Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" name="email" value="" placeholder="Email">
			</div>
			 <div class="form-group">
				<input type="password" class="form-control input-lg" name="password" value="" placeholder="Password">
			 </div>
			  <div class="form-group">
				<input type="password" class="form-control input-lg" name="confirmpwd" value="" placeholder="Confirm Password">
			 </div>
             <button type="submit" class="btn btn-primary" name="registerbtn">Register</button>
        </form>
	  </div>
	  </div>
	  </div>
 </div>
</body>
