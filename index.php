<?php
include 'include/db_connect.php';
include 'model/User.php';
include 'model/LoginModel.php';
include 'model/postModel.php';
session_start();
if (isset($_POST['do'])) include 'controller/' . $_POST['do'];

if (isset($_POST['loc']))
    $loc = $_POST['loc'];
else if (isset($_SESSION['user']))
    $loc = 'profile.php';
else
    $loc = 'login.php';


include 'view/' . $loc;