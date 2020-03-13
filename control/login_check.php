<?php
$invalid;
$captcha;
$spammer;
if (isset($_POST['g-recaptcha-response'])) $captcha = $_POST['g-recaptcha-response'];
if (!$captcha) {
    $spammer = true;
} else {
    $str = "https://www.google.com/recaptcha/api/siteverify?secret=6Lf1E9kUAAAAAHr8SQ1AMz7rGCfIgi_vlEspcgHt" . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
    $response = file_get_contents($str);
    $response_arr = (array) json_decode($response);

    if ($response_arr["success"] == true) {
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
    } else {
        $spammer = true;
    }
}