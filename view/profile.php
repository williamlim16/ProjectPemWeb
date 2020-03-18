<?php
$query = "SELECT * FROM post WHERE username = '" . $_SESSION['user']->getUsername() . "'";
$result = $conn->query($query);
$posts = array(); //gaperlu
foreach ($result as $row) array_push($posts, new PostModel(
    $row['postID'],
    $row['content'],
    $row['username'],
    $row['timestamp'],
    $row['picture']
));

$query2 = "SELECT * FROM user WHERE username = '" . $_SESSION['user']->getusername() . "'";
$result2 = $conn->query($query2);
$result2 = $result2->fetch_assoc();

$users = new User(
    $result2['username'],
    $result2['firstName'],
    $result2['lastName'],
    $result2['password'],
    $result2['bdate'],
    $result2['gender'],
    $result2['profilePicturePath'],
    $result2['coverPath'],
    $result2['contact'],
    $result2['userdesc']
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>X-Self</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/profileStyle.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>

    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background: linear-gradient(to right, #0062E6, #33AEFF)">
        <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive; font-size:25px">Xpress Yourself</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="<?= $users->getprofilePicturePath() ?>" alt="Photo Avatar" id="profileavatar" class="avatar" style="width: 50px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn">
                            <a href="profile.php" class="dropdown-item">Signed in as <br><strong><?= $users->getusername() ?></strong></a>
                            <div class="dropdown-divider"></div>
                            <a href="profile.php" class="dropdown-item">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">Logout</a>
                        </div>

                    </li>
                </ul>
            </form>
        </div>
    </nav>
    <!-- NAV -->



    <div class="container">
        <div class="w3-card">
            <div class="masthead" style="  background-image: url(' <?= $users->getcoverPath() ?>')">
                <div class="container">

                    <div class="container">
                        <img src="<?= $users->getprofilePicturePath() ?> " class="profilePic">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <h2>Following</h2>
                    <h5 style="color: grey">27</h5>
                </div>
                <div class="col-3">
                    <h2>Followers</h2>
                    <h5 style="color: grey">234</h5>
                </div>
                <div class="col-3">
                    <h2>Blocked</h2>
                    <h5 style="color: grey">1</h5>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="margin-top: 30px">
                <!-- ini kartu -->
                <div class="w3-quarter col-3">
                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-container w3-text-black">
                            <h2 style="margin-top: 20px"><?= $users->firstName . " " .  $users->lastName ?></h2>
                        </div>
                        <div class="w3-dark-text-grey w3-container">
                            <h4><?= "@" . $users->username ?></h4>
                            <h5 style="color: black"><?= $users->userdesc ?></h5>
                        </div>
                        <div class="w3-container">
                            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-large w3-text-blue"></i>
                                <?= $users->getbdate(); ?></p>
                            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-blue"></i>Situganteng, UK</p>
                            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-blue"></i>milos@mail.com
                            </p>
                            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-blue"></i>087775176573</p>
                            <hr>

                            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-blue"></i>Skills</b></p>
                            <p>Adobe Photoshop</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-blue" style="width:90%">90%</div>
                            </div>
                            <p>Photography</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-blue" style="width:80%">
                                    <div class="w3-center w3-text-white">80%</div>
                                </div>
                            </div>
                            <p>Illustrator</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-blue" style="width:75%">75%</div>
                            </div>
                            <p>Media</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-blue" style="width:50%">50%</div>
                            </div>
                            <br>

                            <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-blue"></i>Languages</b></p>
                            <p>English</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-round-xlarge w3-blue" style="height:24px;width:100%"></div>
                            </div>
                            <p>Spanish</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-round-xlarge w3-blue" style="height:24px;width:55%"></div>
                            </div>
                            <p>German</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-round-xlarge w3-blue" style="height:24px;width:25%"></div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

                <!-- card 2 -->
                <div class="w3-col m7 col-7">
                    <!-- write status -->
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card w3-round w3-white">
                                <div class="w3-container w3-padding">
                                    <h6 class="w3-opacity">What's on your mind?</h6>
                                    <form method="post">
                                        <div class="form-group row">
                                            <div class="container">
                                                <input type="text" class="w3-border w3-padding form-control" name="post" id="post" style="height: 55px">
                                            </div>
                                        </div>
                                        <input type="hidden" name="do" value="add_post.php">
                                        <input type="hidden" name="loc" value="profile.php">
                                        <input type="hidden" name="username" value="<?= $users->username ?>">
                                        <input type="hidden" name="pp" value="<?= $users->profilePicturePath ?>">

                                        <button type="submit" class="w3-button w3-theme btn-primary" name="submitPost">
                                            <i class="fa fa-pen"></i>&nbsp Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- write status -->
                    <!-- post -->
                    <?php foreach ($posts as $row) : ?>
                        <div class="w3-container w3-card w3-white w3-round w3-margin"><br />
                            <img src=" <?= $row->getPicture() ?>" alt="avatar here" class="w3-left w3-margin-right postPicSize" style="width:60px" />
                            <span class="w3-right w3-opacity"> <?= $row->getTimestamp() ?> </span>
                            <h4><?= $row->getUsername() ?></h4><br />
                            <hr class="w3-clear" />
                            <p><?= $row->getContent() ?></p>
                            <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like</button>
                            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse" data-target="#collapseExample<? $row->getId() ?>"><i class="fa fa-comment"></i> Comment</button>
                            <div class="collapse" id="collapseExample<?= $row->getId() ?>">
                                <div class="card card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
                <!-- card 2 -->
                <div class="col-2">
                    <div class="w3-card w3-round w3-white w3-center">
                        <div class="w3-container">
                            <p>Friend Request</p>
                            <img src="img/ricardo1.jpg" alt="Avatar" style="width:100%" /><br />
                            <span>William Lim</span>
                            <div class="w3-row w3-opacity">
                                <div class="w3-half">
                                    <button class="w3-button w3-block w3-green w3-section" title="Accept">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div class="w3-half">
                                    <button class="w3-button w3-block w3-red w3-section" title="Decline">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>
    <footer class="site-footer" style="margin-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Project UTS Web Programming. Semoga Pak Putu senang dengan project kami.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                        <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                        <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                        <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                        <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                        <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/about/">About Us</a></li>
                        <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                        <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                        <a href="#">Ryukin, Rara, Ryo, William, Michael, Kevin</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>