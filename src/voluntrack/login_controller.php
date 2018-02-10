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
require "DBManager.php";
require "user.php";
use voluntrack\DBManager;
use voluntrack\User;

$dbm = DBManager::get_instance();

$canLogin = $dbm->attempt_login($_POST['username'], $_POST['password']);
$user = new voluntrack\User("", "", "", "");
if ($canLogin !== false && $canLogin > 0) {
    unset($_SESSION['error']);
    //unset($canLogin);
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['user_id'] = $canLogin;
    header("location:../index.php");
}
else {
    //redirect back to login page
    $_SESSION['error'] = "Bad username or password!";
    $_SESSION['logged_in'] = false;
    $_SESSION['user'] = '';
    unset($canLogin);

    header("location: login_view.php");
}


