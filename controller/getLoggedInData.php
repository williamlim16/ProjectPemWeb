<?php
if (isset($_SESSION)) {

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
    if ($loginUser->getcoverPath() == null) $loginUser->setcoverPath("img/defaultCover.jpg");
    if ($loginUser->getprofilePicturePath() == null) $loginUser->setprofilePicturePath("img/defaultProfile.png");
} else {
    header('Location: ../index.php');
}