<?php
$valid;
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
    $password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    $query = 'SELECT * FROM sosmed WHERE username="' . $username . '";';
    $result = $conn->query($query);
    if ($result != false) {
        $match = $result->fetch_assoc();

        $user = new loginCheck($match['username'], $match['password']);
        // if (strtolower($user->getpassword()) == strtolower(md5($password . $user->getsalt()))) {
        //     $valid = true;
        // } else {
        //     $valid = false;
        // }

    }
}
