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
        <form  action="register_controller.php" method="post">
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
