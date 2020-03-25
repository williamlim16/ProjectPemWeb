<?php
// var_dump($_POST);
$skillname = $_POST['skillname'];
$username = $_POST['username'];
$percent = 0;

$query = "INSERT INTO skills(username_fk, skills, percent) VALUE ('$username', '$skillname', '$percent');";
$res = $conn->query($query);
echo $conn->error;
var_dump($res);
