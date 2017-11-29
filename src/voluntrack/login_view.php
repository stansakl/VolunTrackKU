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
	  <div class="panel-heading">Log in</div>
	  <div class="panel-body">
	  <?php
	  if(isset($_SESSION['error'])){
		  echo "<div class=\"alert alert-danger\">" . $_SESSION['error'] . "</div>";
	  }
	  ?>
        <form  action="login.php" method="post">
		    <div class="form-group">
				<input type="text" class="form-control input-lg" name="username" value="" placeholder="User name or email">
			</div>
			 <div class="form-group">
				<input type="password" class="form-control input-lg" name="password" value="" placeholder="Password">
			 </div>
             <button type="submit" class="btn btn-primary" name="loginbtn">Login</button>
        </form>
	  </div>
	  </div>
	  </div>
	</div>
 </body>
