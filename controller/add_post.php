<?php
if (isset($_POST['submitPost'])) {
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['post']));
    $username = $_POST['username'];
    $timestamp = date("h:i a");
    $picture = $_POST['pp'];

    $target_dir = "resource/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($_FILES['fileToUpload']['error'] == UPLOAD_ERR_NO_FILE){
        if (!$conn->query('INSERT INTO post (content, username, timestamp, picture) VALUES("' . $content . '", "' . $username . '","' . $timestamp . '", "' . $picture . '");')) {
            echo ("Error description: " . $conn->error);}
    }else{
        if(isset($_POST["submitPost"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "<script type='text/javascript'>alert('File is not an image.');</script>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script type='text/javascript'>alert('Sorry, file already exists.');</script>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "<script type='text/javascript'>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.');</script>";
    
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<script type='text/javascript'>alert('The file ".basename( $_FILES["fileToUpload"]["name"])." has been uploaded.');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
        if (!$conn->query('INSERT INTO post (content, username, timestamp, picture, photos) VALUES("' . $content . '", "' . $username . '","' . $timestamp . '", "' . $picture . '","' . 'resource/'.basename( $_FILES["fileToUpload"]["name"]) . '");')) {
            echo ("Error description: " . $conn->error);
        }

    }

    unset($_POST['submitPost']);
} else if (isset($_POST['editpost'])) {
    $content = mysqli_real_escape_string($conn, strip_tags($_POST['post']));
    $postid = $_POST['editpost'];
    $timestamp = date("h:i a");

    if (!$conn->query('UPDATE post SET content = "' . $content . '", timestamp = "' . $timestamp . '" WHERE postID = "' . $postid . '"')) {
        echo ("Error description: " . $conn->error);
    }

    unset($_POST['submitpost']);
} else if (isset($_POST['delete'])) {
    $postid = $_POST['delete'];

    if (!$conn->query('DELETE FROM post WHERE postID = "' . $postid . '"')) {
        echo ("Error description: " . $conn->error);
    }

    unset($_POST['delete']);
}
