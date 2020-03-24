<?php
$query = "SELECT * FROM user WHERE username = '" . $_SESSION['user']->getusername() . "'";
$result = $conn->query($query);
$result = $result->fetch_assoc();

$loginUser = new User(
    $result['username'],
    $result['firstName'],
    $result['lastName'],
    $result['password'],
    $result['bdate'],
    $result['phonenum'],
    $result['gender'],
    $result['profilePicturePath'],
    $result['coverPath'],
    $result['contact'],
    $result['userdesc']
);