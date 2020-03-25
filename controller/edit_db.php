<?php
function sterilize_input($input)
{
    $input = trim($input); // Ngilangin spasi, enter dll
    $input = strip_tags($input); //Ilangin < dan >
    $input = stripslashes($input); //utk escape " atau '
    $input = htmlspecialchars($input); //Mirip strip-tag
    return $input;
}

$response = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data-data dari form
    $user_username = sterilize_input($_POST['username']); //new addition, database's primary key
    $user_email = sterilize_input($_POST['email']);
    $user_gender = sterilize_input($_POST['gender']);
    $user_lastname = sterilize_input($_POST['lastname']);
    $user_firstname = sterilize_input($_POST['firstname']);
    $user_dateofbirth = sterilize_input($_POST['date_of_birth']);
    $user_phone_number = sterilize_input($_POST['phone_number']);
    $user_profile_picture = sterilize_input($_POST['pp']);
    $user_cover = sterilize_input($_POST['cover']);

    // Sesuaikan nama tabel di sini
    $table_name = 'user';
    // Periksa apakah berhasil connect
    if ($conn->connect_errno) {
        $response['status'] = 'DB connect failed';
        $response['message'] = 'Failed to connect to DB!';
    } else { // Aman, berhasil konek
        // Update DB
        $insert_query = "UPDATE $table_name SET firstName='$user_firstname', lastName='$user_lastname', bdate='$user_dateofbirth', gender='$user_gender', contact='$user_email', phonenum = '$user_phone_number', profilePicturePath='$user_profile_picture', coverPath='$user_cover' WHERE username='$user_username'";
        // Cek hasil insert
        $insert_result = $conn->query($insert_query);
        // Atur Response
        if ($insert_result == false) {
            echo $conn->error;
            $response['status'] = 'failed';
            $response['message'] = 'Failed to insert values to DB!';
        } else {
            // echo "SUCCESS";
            $response['status'] = 'success';
            $response['message'] = 'User Update Successful!';
            $_POST['loc'] = 'profile.php';
        }
    }
}



// Kembalikan response JSON
// echo json_encode($response);

// Atau langsung redirect
// // Harus Absolute URL
// if ($response['status'] == 'success')
//     header('Location: http://localhost:8080/uts/home.php');
// else
//     header('Location: http://localhost:8080/uts/signup.html');