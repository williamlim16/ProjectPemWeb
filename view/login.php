<!DOCTYPE html>
<html lang="en">

<?php
// if (isset($_POST))
//   var_dump($_POST);
?>

<head>
    <title>X-Self</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Google reCAPTCHA-->
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>
    <div class="container col-md-7">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="text-center">
                    <p style="font-family: 'Pacifico', cursive; font-size:50px" class="main-text">
                        Xpress Yourself</p>
                </div>
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="">
                            <div class="form-label-group">
                                <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="username">
                                <label for="username">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <div class="container center">
                                <div class="g-recaptcha" data-sitekey="6Lf1E9kUAAAAABm_-Q-sgcnjaTX1d11-guJJ1m4X" style="margin-bottom: 10px">
                                </div>
                            </div>

                            <hr class="size=4">
                            <?php if (isset($invalid) && $invalid) { ?>
                                <p class='text-danger'>Invalid credentials.</p>
                            <?php } ?>
                            <?php if (isset($spammer) && $spammer) { ?>
                                <p class='text-danger'>Please complete the Captcha.</p>
                            <?php } ?>
                            <input type="hidden" name="do" value="login_check.php">
                            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Sign In">
                        </form>
                        <form class="form-signin" method="POST" style="margin-top: 10px">
                            <button name='loc' value="register.php" class='btn btn-lg btn-block btn-warning text-uppercase'>Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>