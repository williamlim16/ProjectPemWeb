<?php
if (isset($_POST['submitPost'])) {
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['post']));
    $username = $_POST['username'];
    $timestamp = date("h:i a");
    $picture = $_POST['pp'];


    if (!$conn->query('INSERT INTO post (content, username, timestamp, picture) VALUES("' . $content . '", "' . $username . '","' . $timestamp . '", "' . $picture . '");')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['username']);
    unset($_POST['submitPost']);
} else if (isset($_POST['editpost'])) {
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['post']));
    $postid = $_POST['editpost'];
    $timestamp = date("h:i a");

    if (!$conn->query('UPDATE post SET content = "' . $content . '", timestamp = "' . $timestamp . '" WHERE postID = "' . $postid . '"')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['username']);
    unset($_POST['submitpost']);
} else if (isset($_POST['delete'])) {
    $postid = $_POST['delete'];

    if (!$conn->query('DELETE FROM post WHERE postID = "' . $postid . '"')) {
        echo ("Error description: " . $conn->error);
    }
    unset($_POST['username']);
    unset($_POST['delete']);
}
