<?php
if(isset($_POST['profile'])){
    unset($_POST['username']);
    header("Refresh:0");
} else {
$query = 'SELECT * FROM user WHERE NOT username = "'.$_SESSION['user']->getusername().'" ';
$result = $conn->query($query);
if(mysqli_num_rows($result) == 0){
    $loc = 'profile.php';
    echo "<script type='text/javascript'>alert('You have no recommendations right now !');</script>";  
}}