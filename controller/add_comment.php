<?php
if (isset($_POST['submitcomment'])) {
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['comment']));
    $postid = $_POST['submitcomment'];
    $timestamp = date("h:i a");
    $username = $_POST['username'];

    if (!$conn->query('INSERT INTO comment (content, username, postID, timestamp) VALUES("' . $content . '", "' . $username . '","' . $postid .'","' . $timestamp . '");')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['submitcomment']);
    unset($_POST['username']);
} else if (isset($_POST['editcomment'])){
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['comment']));
    $comid = $_POST['editcomment'];
    $timestamp = date("h:i a");
    $username = $_POST['username'];

    if (!$conn->query('UPDATE comment SET content = "'.$content.'", timestamp = "'.$timestamp.'" WHERE commentID = "'.$comid.'"')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['editcomment']);
    unset($_POST['username']);
} else if(isset($_POST['delete'])){
    $comid = $_POST['delete'];
    if (!$conn->query('DELETE FROM comment WHERE commentID = "'.$comid.'"')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['delete']);
    unset($_POST['username']);

}