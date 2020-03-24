<?php
// var_dump($_POST);
include 'controller/getLoggedInData.php';

$getPost = "SELECT * FROM post";

$result = $conn->query($getPost);
$userPost = array();
foreach ($result as $row) array_push($userPost, new PostModel(
    $row['postID'],
    $row['content'],
    $row['username'],
    $row['timestamp'],
    $row['picture']
));


?>
<!doctype html>
<html lang="en">


<head>
    <title>X-Self</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                        <button class="btn btn-link" type="submit" style="color:white">Home <span
                                class="sr-only">(current)</span></but>
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
                                <button type="submit" name="do" value="session.php" class="dropdown-item">My
                                    Profile</button>
                                <input type="hidden" name="profile">
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
            <h2 class="m-5" style="padding-top:30px">Public Posts</h2>
            <div class="col-md-12">

                <?php foreach (array_reverse($userPost) as $row) : ?>
                <div class="w3-container w3-card w3-white w3-round w3-margin"><br />
                    <img src=" <?= $row->getPicture() ?>" alt="avatar here" class="w3-left w3-margin-right postPicSize"
                        style="width:60px" />
                    <span class="w3-right w3-opacity"> <?= $row->getTimestamp() ?> </span>
                    <h4><a href="index.php?user=<?= $row->getUsername() ?>"><?= $row->getUsername() ?>
                        </a></h4><br />
                    <hr class="w3-clear" />
                    <p><?= $row->getContent() ?></p>
                    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>
                        Like</button>
                    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse"
                        data-target="#collapseExample<?= $row->getId() ?>"><i class="fa fa-comment"></i>
                        Comment</button>
                    <button type="button" <?php if ($loginUser->getusername() != $row->getUsername()) echo ' hidden ' ?>
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
                            <input type="hidden" name="loc" value="home.php">
                        </form>
                        <hr>
                    </div>

                    <div class="collapse" id="collapseExample<?= $row->getId() ?>">
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
                                        class="w3-left w3-margin-right postPicSize" style="width: 35px;height: 35px;" />
                                    <h5 class="mb-1"><a
                                            href="index.php?user=<?= $com->getUsername() ?>"><?= $com->getUsername() ?>
                                        </a>
                                        </h3>
                                </div>
                                <hr>
                                <p class="mb-1"><?= $com->getContent(); ?></p>
                                <small><?= $com->getTimestamp(); ?></small>
                                <small><a class="" data-toggle="collapse"
                                        <?php if ($loginUser->getusername() != $row->getUsername()) echo ' hidden ' ?>
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
                                        <input type="hidden" name="loc" value="home.php">

                                    </form>
                                </div>
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
                                class="btn btn-info">Add
                                Comment</button>
                            <input type="hidden" name="do" value="add_comment.php">
                            <input type="hidden" name="username" value="<?= $loginUser->username ?>">
                            <input type="hidden" name="loc" value="home.php">

                        </form>
                        <hr>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    </div>


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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"
        integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>