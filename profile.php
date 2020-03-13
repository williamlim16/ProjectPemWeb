<!doctype html>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="img/defaultProfile.png" alt="Photo Avatar" id="profileavatar" class="avatar" style="width: 50px">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right animate slideIn">
                            <a href="profile.php" class="dropdown-item">Signed in as <br><strong>{{username}}</strong></a>
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
            <div class="masthead">
                <div class="container">
                    <img src="img/defaultProfile.png" class="profilePic">
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
                            <h2 style="margin-top: 20px">Ricardo Milos</h2>
                        </div>
                        <div class="w3-dark-text-grey w3-container">
                            <h4>@ricardohusbando</h4>
                        </div>
                        <div class="w3-container">
                            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-blue"></i>Designer</p>
                            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-blue"></i>London, UK</p>
                            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-blue"></i>ex@mail.com</p>
                            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-blue"></i>1224435534</p>
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
                                    <p contenteditable="true" class="w3-border w3-padding">
                                        Mr.Stark, I feel really good.
                                    </p>
                                    <button type="button" class="w3-button w3-theme btn-primary">
                                        <i class="fa fa-pen"></i> Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- write status -->
                    <!-- post -->
                    <div class="w3-container w3-card w3-white w3-round w3-margin">
                        <br />
                        <img src="img/defaultProfile.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px" />
                        <span class="w3-right w3-opacity">69 min</span>
                        <h4>Ricardo Milos</h4>
                        <br />
                        <hr class="w3-clear" />
                        <p>
                            Felt cute might delete later idk.
                        </p>
                        <div class="w3-row-padding" style="margin:0 -16px">
                            <div class="w3-half">
                                <img src="img/ricardo1.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom" />
                            </div>
                            <div class="w3-half">
                                <img src="img/ricardo2.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom" />
                            </div>
                        </div>
                        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
                            <i class="fa fa-thumbs-up"></i> Like
                        </button>
                        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
                            <i class="fa fa-comment"></i> Comment
                        </button>
                    </div>
                    <!-- post -->
                    <!-- post -->
                    <div class="w3-container w3-card w3-white w3-round w3-margin">
                        <br />
                        <img src="img/defaultProfile.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px" />
                        <span class="w3-right w3-opacity">69 min</span>
                        <h4>Ricardo Milos</h4>
                        <br />
                        <hr class="w3-clear" />
                        <p>
                            Felt cute might delete later idk.
                        </p>
                        <div class="w3-row-padding" style="margin:0 -16px">
                            <div class="w3-half">
                                <img src="img/ricardo1.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom" />
                            </div>
                            <div class="w3-half">
                                <img src="img/ricardo2.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom" />
                            </div>
                        </div>
                        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
                            <i class="fa fa-thumbs-up"></i> Like
                        </button>
                        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
                            <i class="fa fa-comment"></i> Comment
                        </button>
                    </div>
                    <!-- post -->

                </div>
                <!-- card 2 -->
                <div class="col-2">
                    <div class="w3-card w3-round w3-white w3-center">
                        <div class="w3-container">
                            <p>Friend Request</p>
                            <img src="img/michael.png" alt="Avatar" style="width:100%" /><br />
                            <span>Michael Chen</span>
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