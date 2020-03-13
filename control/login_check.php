<?php
$invalid;
if (isset($_POST['submit'])) {
    // var_dump($_POST);
    $username = mysqli_real_escape_string(
        $conn,
        strip_tags($_POST['username'])
    );
    $password = mysqli_real_escape_string(
        $conn,
        strip_tags($_POST['password'])
    );

    $query = 'SELECT * FROM user WHERE username="' . $username . '"';
    $res = $conn->query($query);
    // var_dump($res->fetch_assoc());

    if ($res) {
        $res = $res->fetch_assoc();
        $loginCred = new LoginModel($res['username'], $res['password']);
        // echo md5($password);
        // echo "<br>";
        // echo $loginCred->getpassword();
        if ($loginCred->getpassword() == md5($password)) {
            $_SESSION['user'] = $loginCred;
            // var_dump($_SESSION);
        } else if (isset($_SESSION['user'])) unset($_SESSION['user']);
    }
    if (!isset($_SESSION['user'])) {
        $invalid = true;
    }
}