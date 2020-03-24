<?php
if (isset($_POST['submitcomment'])) {
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['comment']));
    $postid = $_POST['submitcomment'];
    $timestamp = date("h:i a");
    $username =  $_SESSION['user']->getusername();
    $picture = $_POST['pp'];

    if (!$conn->query('INSERT INTO comment (content, username, postID, timestamp, picture) VALUES("' . $content . '", "' . $username . '","' . $postid . '","' . $timestamp . '","' . $picture . '");')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['submitcomment']);

} else if (isset($_POST['editcomment'])){
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['comment']));
    $comid = $_POST['editcomment'];
    $timestamp = date("h:i a");

    if (!$conn->query('UPDATE comment SET content = "' . $content . '", timestamp = "' . $timestamp . '" WHERE commentID = "' . $comid . '"')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['editcomment']);

} else if(isset($_POST['delete'])){
    $comid = $_POST['delete'];
    if (!$conn->query('DELETE FROM comment WHERE commentID = "' . $comid . '"')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['delete']);

}