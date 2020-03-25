<?php
// var_dump($_POST);
$skillname = $_POST['skillname'];
$username = $_POST['username'];
$percent = 0;

$query = "DELETE FROM skills where username_fk ='$username' and skills = '$skillname';";
$res = $conn->query($query);
echo $conn->error;
// var_dump($res);