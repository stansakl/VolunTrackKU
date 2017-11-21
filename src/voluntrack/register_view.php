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
	  <?php
	  if(isset($_SESSION['error'])){
		  echo "<div class=\"alert alert-danger\">" . $_SESSION['error'] . "</div>";
	  }
	  ?>
        <form  action="register.php" method="post">
		    <div class="form-group">
				<input type="text" class="form-control input-lg" name="firstname" value="" placeholder="First Name" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" name="middlename" value="" placeholder="Middle Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" name="lastname" value="" placeholder="Last Name" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" name="email" value="" placeholder="Email" required>
			</div>
			 <div class="form-group">
				<input type="password" class="form-control input-lg" name="password" value="" placeholder="Password" required>
			 </div>
			  <div class="form-group">
				<input type="password" class="form-control input-lg" name="confirmpwd" value="" placeholder="Confirm Password" required>
			 </div>
             <button type="submit" class="btn btn-primary" name="registerbtn">Register</button>
        </form>
	  </div>
	  </div>
	  </div>
 </div>
</body>
