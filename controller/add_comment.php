<?php
if (isset($_POST['submitcomment'])) {
    $content = $_POST['comment'];
    $postid = $_POST['submitcomment'];
    $username = $_POST['username'];

    if (!$conn->query('INSERT INTO comment (content, username, postID) VALUES("' . $content . '", "' . $username . '","' . $postid .'");')) {
        echo ("Error description: " . $conn->error);
    }

    unset($_POST['submitcomment']);
}