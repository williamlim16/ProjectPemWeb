<?php
// var_dump($_POST);
include 'controller/getLoggedInData.php';
$otherUser = false;
if (isset($_GET['user'])) $_POST['username'] = $_GET['user'];

if (isset($_POST['username']) && $_POST['username'] != $_SESSION['user']->getusername()) {
    $getUserProfile = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "'";
    $result = $conn->query($getUserProfile);
    $result = $result->fetch_assoc();
    $userProfile = new User(
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

    $getPost = "SELECT * FROM post WHERE username = '" . $_POST['username'] . "'";
    $getPostCount = "SELECT count(*) as total from post WHERE username = '" . $_POST['username'] . "'";
    $otherUser = true;
} else {
    $userProfile = $loginUser;
    $getPost = "SELECT * FROM post WHERE username = '" . $_SESSION['user']->getusername() . "'";
    $getPostCount = "SELECT count(*) as total from post WHERE username = '" . $_SESSION['user']->getusername()  . "'";
}

//set user posts
$result = $conn->query($getPost);
$userPost = array();
foreach ($result as $row) array_push($userPost, new PostModel(
    $row['postID'],
    $row['content'],
    $row['username'],
    $row['timestamp'],
    $row['picture'],
    $row['photos']
));

$count = $conn->query($getPostCount);
$count = $count->fetch_assoc();

// var_dump($userProfile);
//null checker
if ($userProfile->getcoverPath() == null) $userProfile->setcoverPath("img/defaultCover.jpg");
if ($userProfile->getprofilePicturePath() == null) $userProfile->setprofilePicturePath("img/defaultProfile.png");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>X-Self</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/profileStyle.css">
    <link rel="stylesheet" href="css/footer.css">
    <style>
    a {
        color: black;
    }
    </style>
</head>

<body>
    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"
        style="background: linear-gradient(to right, #0062E6, #33AEFF)">
        <a class="navbar-brand" href="index.php" style="font-family: 'Pacifico', cursive; font-size:25px">Xpress
            Yourself</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <form method="post">
                        <input type="hidden" name="loc" value="home.php">
                        <button class="btn btn-link p-0" type="submit" style="color:white">Home <span
                                class="sr-only">(current)</span></button>
                    </form>
                </li>
            </ul>
            <form method="POST" class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">

                            <img src="<?= $loginUser->getprofilePicturePath() ?>" alt="Photo Avatar" id="profileavatar"
                                class="avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn">
                            <a href="index.php" class="dropdown-item">Signed in as
                                <br><strong><?= $loginUser->getusername() ?></strong></a>
                            <div class="dropdown-divider"></div>
                            <form method="POST">
                                <button type="submit" name="loc" value="profile.php" class="dropdown-item">My
                                    Profile</button>
                                <!-- ini gimana maksudnya? -->
                            </form>
                            <div class="dropdown-divider"></div>
                            <form method="POST">
                                <button type="submit" name="do" value="logout.php" class="dropdown-item">Logout</button>
                                <input type="hidden" name="loc" value="login.php">
                            </form>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </nav>
    <!-- NAV -->

    <div class="container">
        <div class="w3-card cont">

            <div class="masthead" style="background-image: url('<?= $userProfile->getcoverPath() ?>')" alt="No cover!">
            </div>
            <img class="prof" src="                       
            <?= $userProfile->profilePicturePath; ?>"
                style="display: block;max-width:180px; max-height:180px; width:auto; height:auto;">
            <div class="row">
                <div class="col-3">
                    <?php if (!$otherUser) { ?>
                    <form method="POST">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-link">
                                <i class="fas fa-pencil-alt" style="font-size:40px; color:black"></i>
                            </button>
                            <input type="hidden" name="loc" value="edit.php">
                        </div>
                    </form>
                    <?php } ?>
                </div>
                <div class="col-md-3">
                    <h2>Following</h2>
                    <h5 style="color: grey">27</h5>
                </div>
                <div class="col-md-3">
                    <h2>Followers</h2>
                    <h5 style="color: grey">234</h5>
                </div>
                <div class="col-md-3">
                    <h2>Posts</h2>
                    <h5 style="color: grey"><?= $count['total']; ?></h5>
                </div>

            </div>
        </div>

        <!-- Information -->
        <div class="container">
            <div class="row" style="margin-top: 30px">
                <div class="col-md-3">
                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-container w3-text-black">
                            <h2 style="margin-top: 20px">

                                <?php
                                echo $userProfile->firstName . " " . $userProfile->lastName;
                                ?>
                            </h2>
                        </div>
                        <div class="w3-dark-text-grey w3-container">
                            <h4>

                                <?= "@" . $userProfile->username ?>
                            </h4>
                            <h5 style="color: black">
                                <?= $userProfile->userdesc;
                                ?>
                            </h5>
                        </div>
                        <div class="w3-container">
                            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-large w3-text-blue"></i>

                                <?= $userProfile->bdate ?>
                            </p>
                            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-blue"></i>
                                <?= $userProfile->contact ?>
                            </p>
                            <hr>
                            <?php
                            $query = "SELECT * FROM skills WHERE username_fk =  '" . $_SESSION['user']->getusername() . "'";
                            $result = $conn->query($query);
                            $skills = array();
                            foreach ($result as $row) array_push($skills, new Skills($row['username_fk'], $row['skills'], $row['percent']));

                            ?>
                            <p class="w3-large"><b><i
                                        class="fa fa-asterisk fa-fw w3-margin-right w3-text-blue"></i>Skills</b></p>
                            <?php foreach ($skills as $row2) : ?>
                            <p><?php echo $row2->getskills() ?></p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-blue"
                                    style="width:<?php echo $row2->getpercentage() . '%' ?>">
                                    <?php echo $row2->getpercentage() ?>%</div>
                            </div>
                            <?php endforeach; ?>

                            <br>
                            <!-- <p class="w3-large w3-text-theme"><b><i
                                        class="fa fa-globe fa-fw w3-margin-right w3-text-blue"></i>Languages</b></p>
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
                            <br> -->
                        </div>
                    </div>
                </div>

                <!-- card 2 -->
                <div class="col-md-7">
                    <!-- write status -->
                    <?php if (!$otherUser) { ?>
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card w3-round w3-white">
                                <div class="w3-container w3-padding">
                                    <h6 class="w3-opacity">What's on your mind?</h6>
                                    <form method="post">
                                        <div class="form-group row">
                                            <div class="container">
                                                <input type="text" class="w3-border w3-padding form-control" name="post"
                                                    id="post" style="height: 55px">
                                            </div>
                                        </div>
                                        <input type="hidden" name="do" value="add_post.php">
                                        <input type="hidden" name="loc" value="profile.php">
                                        <input type="hidden" name="username" value="<?= $loginUser->username ?>">
                                        <input type="hidden" name="pp" value="<?= $loginUser->profilePicturePath ?>">

                                        <button type="submit" class="w3-button w3-theme btn-primary" name="submitPost">
                                            <i class="fa fa-pen"></i>&nbsp Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- write status -->

                    <?php foreach (array_reverse($userPost) as $row) : ?>
                    <div class="w3-container w3-card w3-white w3-round w3-margin"><br />
                        <img src=" <?= $row->getPicture() ?>" alt="avatar here"
                            class="w3-left w3-margin-right postPicSize" style="width:60px" />
                        <span class="w3-right w3-opacity"> <?= $row->getTimestamp() ?> </span>
                        <h4><a href="index.php?user=<?= $row->getUsername() ?>"><?= $row->getUsername() ?></a></h4>
                        <br />
                        <hr class="w3-clear" />
                        <p><?= $row->getContent() ?></p>
                        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i
                                class="fa fa-thumbs-up"></i> Like</button>
                        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse"
                            data-target="#postCollapse<?= $row->getId() ?>"><i class="fa fa-comment"></i>
                            Comment</button>
                        <button type="button" <?php if ($otherUser) echo ' hidden ' ?>
                            class="w3-button w3-theme-d1 w3-margin-bottom" data-toggle="collapse"
                            data-target="#collapseEdit<?= $row->getId() ?>"><i class="fas fa-pencil-alt"></i>
                            Edit</button>

                        <div class="collapse" id="collapseEdit<?= $row->getId() ?>">
                            <form method="post">
                                <div class="form-group">
                                    <textarea class="form-control" name="post"><?= $row->getContent() ?></textarea>
                                </div>
                                <button type="submit" name="editpost" value="<?= $row->getId() ?>"
                                    class="btn btn-success">Confirm</button>
                                <input type="hidden" name="do" value="add_post.php">
                                <button type="submit" name="delete" value="<?= $row->getId() ?>"
                                    class="btn btn-danger">Delete</button>
                                <input type="hidden" name="do" value="add_post.php">
                            </form>
                            <hr>
                        </div>

                        <div class="collapse" id="postCollapse<?= $row->getId() ?>">
                            <!--GET COMMENT FOR EACH POST WITH QUERY, NOT REQUESTING ALL COMMENT AT ONCE -->
                            <?php
                                $id = $row->getId();
                                $getComment = "SELECT * FROM comment WHERE comment.PostID = '$id'";
                                $res = $conn->query($getComment);
                                $comments = array();
                                foreach ($res as $com) array_push($comments, new CommentModel(
                                    $com['commentID'],
                                    $com['content'],
                                    $com['username'],
                                    $com['postID'],
                                    $com['timestamp']
                                ));
                                foreach ($comments as $com) : ?>

                            <div class="list-group">
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-start">
                                        <img src=" <?= $row->getPicture() ?>" alt="avatar here"
                                            class="w3-left w3-margin-right postPicSize"
                                            style="width: 35px;height: 35px;" />
                                        <h5 class="mb-1"><a
                                                href="index.php?user=<?= $com->getUsername() ?>"><?= $com->getUsername() ?></a>
                                            </h3>
                                    </div>
                                    <hr>
                                    <p class="mb-1"><?= $com->getContent(); ?></p>
                                    <small><?= $com->getTimestamp(); ?></small>
                                    <small><a class="" data-toggle="collapse"
                                            <?php if ($com->getusername() != $loginUser->getusername()) echo ' hidden ' ?>
                                            href="#collapseExample<?= $com->getCommentId() ?>" role="button">
                                            Edit</a></small>
                                    <div class="collapse" id="collapseExample<?= $com->getCommentId() ?>">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <textarea class="form-control"
                                                    name="comment"><?= $com->getContent() ?></textarea>
                                            </div>
                                            <button type="submit" name="editcomment" value="<?= $com->getCommentId() ?>"
                                                class="btn btn-success">Confirm</button>
                                            <input type="hidden" name="do" value="add_comment.php">
                                            <input type="hidden" name="username" value="<?= $loginUser->username ?>">
                                            <button type="submit" name="delete" value="<?= $com->getCommentId() ?>"
                                                class="btn btn-danger">Delete</button>
                                            <input type="hidden" name="do" value="add_comment.php">
                                        </form>
                                    </div>
                                </div>
                                <p class="mb-1"></p>
                                <?php endforeach; ?>
                                <hr>
                                <form method="POST" action="">

                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Add your comment" name="comment"
                                            id="textarea"></textarea>
                                    </div>
                                    <button type="submit" name="submitcomment" value="<?= $row->getId() ?>"
                                        class="btn btn-info">Add Comment</button>
                                    <input type="hidden" name="do" value="add_comment.php">
                                    <input type="hidden" name="pp" value="<?= $loginUser->profilePicturePath ?>">
                                    <input type="hidden" name="username" value="<?= $row->getUsername() ?>">
                                </form>
                                <hr>
                            </div>
                            <p class="mb-1"></p>
                            <?php endforeach; ?>
                            <hr>
                            <form method="POST" action="">

                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Add your comment" name="comment"
                                        id="textarea"></textarea>
                                </div>
                                <button type="submit" name="submitcomment" value="<?= $row->getId() ?>"
                                    class="btn btn-info">Add Comment</button>
                                <input type="hidden" name="do" value="add_comment.php">
                                <input type="hidden" name="username" value="<?= $loginUser->username ?>">
                            </form>
                            <hr>
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <!-- post -->


                </div>


                <div class="col-md-2">
                    <div class="w3-card w3-round w3-white w3-center" style="width: 110%; padding:20px">
                        <form method="POST">
                            <input type="hidden" name="loc" value="alluser.php">
                            <button class="btn btn-link">
                                <a style="color:black">Find more friends!</a>
                            </button>
                        </form>
                        <img src="img/addfriend.png" alt="Avatar" style="width:100%" /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="site-footer" style="margin-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Project UTS Web Programming. Semoga Pak Putu senang dengan project kami.
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Materials</h6>
                    <ul class="footer-links">
                        <li>
                            <a>HTML5</a>
                        </li>
                        <li>
                            <a>CSS</a>
                        </li>
                        <li>
                            <a>Bootstrap</a>
                        </li>
                        <li>
                            <a>PHP</a>
                        </li>
                        <li>
                            <a>Javascript</a>
                        </li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Members</h6>
                    <ul class="footer-links">
                        <li><a href="#">Aurelius Ryo Wang</a></li>
                        <li><a href="#">Arida Amalia Rosa</a></li>
                        <li><a href="#">Kevin Sherdy Lieanto </a></li>
                        <li><a href="#">Michael</a></li>
                        <li><a href="#">Ryukin Aranta Lika</a></li>
                        <li><a href="#">William</a></li>
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


            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    jQuery('button').click(function(e) {
        jQuery('.collapse').collapse('hide');
    });
    // $('#addc').click(function() {
    //     var comment = $('#textarea').val();
    //     var username = $('#uname').val();
    //     var id = $('#addc').val()
    //     $.ajax({
    //         type: 'POST',
    //         url: './controller/add_comment.php',
    //         data: { comment: comment, username: username, submitcontent: id }
    //     });
    // });
    </script>

</body>

</html>