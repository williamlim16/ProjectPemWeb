<!-- post another user -->
<?php if (isset($_POST['username'])) { ?>
    <?php foreach (array_reverse($post_others) as $row) : ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br />
            <img src=" <?= $row->getPicture() ?>" alt="avatar here" class="w3-left w3-margin-right postPicSize" style="width:60px" />
            <span class="w3-right w3-opacity"> <?= $row->getTimestamp() ?> </span>
            <h4><?= $row->getUsername() ?></h4><br />
            <hr class="w3-clear" />
            <p><?= $row->getContent() ?></p>
            <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like</button>
            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse" data-target="#collapseExample<?= $row->getId() ?>"><i class="fa fa-comment"></i>
                Comment</button>
            <button type="button" <?php if ($_SESSION['user']->getusername() != $row->getUsername()) echo ' hidden ' ?> class="w3-button w3-theme-d1 w3-margin-bottom" data-toggle="collapse" data-target="#collapseEdit<?= $row->getId() ?>"><i class="fa fa-pencil"></i>
                Edit</button>

            <!-- collapse edit post-->
            <div class="collapse" id="collapseEdit<?= $row->getId() ?>">
                <form method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="post"><?= $row->getContent() ?></textarea>
                    </div>
                    <button type="submit" name="editpost" value="<?= $row->getId() ?>" class="btn btn-success">Confirm</button>
                    <input type="hidden" name="do" value="add_post.php">
                    <button type="submit" name="delete" value="<?= $row->getId() ?>" class="btn btn-danger">Delete</button>
                    <input type="hidden" name="do" value="add_post.php">
                </form>
                <hr>
            </div>

            <!-- collapse comment-->
            <div class="collapse" id="collapseExample<?= $row->getId() ?>">
                <?php foreach ($comments as $com) : ?>
                    <?php if ($com->getId() == $row->getId()) { ?>

                        <div class="list-group">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-start">
                                    <img src=" <?= $row->getPicture() ?>" alt="avatar here" class="w3-left w3-margin-right postPicSize" style="width: 35px;height: 35px;" />
                                    <h5 class="mb-1"><?= $com->getUsername() ?></h3>
                                </div>
                                <hr>
                                <p class="mb-1"><?= $com->getContent(); ?></p>
                                <small><?= $com->getTimestamp(); ?></small>
                                <small><a class="" data-toggle="collapse" <?php if ($_SESSION['user']->getusername() != $com->getUsername()) echo ' hidden ' ?> href="#collapseExample<?= $com->getCommentId() ?>" role="button">
                                        Edit</a></small>
                                <div class="collapse" id="collapseExample<?= $com->getCommentId() ?>">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment"><?= $com->getContent() ?></textarea>
                                        </div>
                                        <button type="submit" name="editcomment" value="<?= $com->getCommentId() ?>" class="btn btn-success">Confirm</button>
                                        <input type="hidden" name="do" value="add_comment.php">
                                        <input type="hidden" name="username" value="<?= $loginUser->username ?>">
                                        <button type="submit" name="delete" value="<?= $com->getCommentId() ?>" class="btn btn-danger">Delete</button>
                                        <input type="hidden" name="do" value="add_comment.php">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <p class="mb-1"><?php } ?>
                    <?php endforeach; ?>
                    <hr>
                    <form method="POST" action="">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Add your comment" name="comment" id="textarea"></textarea>
                        </div>
                        <button id="addc" type="" name="submitcomment" value="<?= $row->getId() ?>" class="btn btn-info">Add Comment</button>
                        <input type="hidden" value="add_comment.php">
                        <input type="hidden" id="uname" name="username" value="<?= $loginUser->username ?>">
                    </form>
                    <hr>
            </div>
        </div>
    <?php endforeach; ?>
<?php } ?>