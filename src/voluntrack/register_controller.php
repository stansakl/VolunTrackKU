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
require "DBManager.php";
use voluntrack\DBManager;

session_start();
$dbm = DBManager::get_instance();

if ($_POST['password'] !== $_POST['confirmpwd']) {
    $_SESSION['error'] = "Passwords do not match!";
    header("location: register_view.php");
}

try {
    unset($_SESSION['error']);
    $dbm->register_user($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['email'],$_POST['password']);
    header("location: ../index.php");

} catch (\Exception $e) {
    
    $_SESSION['error'] = "An error occurred registering the user. Please try again.";
    header("location: register_view.php");
}
