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
    $user_password = sterilize_input($_POST['user_password']);
    $user_email = sterilize_input($_POST['email']);
    $user_gender = sterilize_input($_POST['gender']);
    $user_lastname = sterilize_input($_POST['lastname']);
    $user_firstname = sterilize_input($_POST['firstname']);
    $user_dateofbirth = sterilize_input($_POST['date_of_birth']);
    $user_phone_number = sterilize_input($_POST['phone_number']);

    // Sesuaikan nama tabel di sini
    $table_name = 'user';

    // Periksa apakah berhasil connect
    if ($conn->connect_errno) {
        $response['status'] = 'DB connect failed';
        $response['message'] = 'Failed to connect to DB!';
    } else { // Aman, berhasil konek
        // Periksa Primary Key Duplikat
        // Primary key = username
        $check_query = "SELECT username FROM $table_name WHERE username='$user_username'"; //ga perlu pake limit
        $result = $conn->query($check_query);
        $duplikat = $result->num_rows != 0;

        if ($duplikat == false) {
            $response['status'] = 'duplicate';
            $response['message'] = 'Username already exists!';
        } else { // Aman, ketemu datanya
            // Tambahkan pemeriksaan2 atau perubahan value di sini
            // Update DB
            $insert_query = "UPDATE $table_name SET username='$user_username', password='$user_password', firstName='$user_firstname', lastName='$user_lastname', bdate='$user_dateofbirth', gender='$user_gender', contact='$user_email'";
            // phone number belum dipakai
            // Cek hasil insert
            $insert_result = $conn->query($insert_query);


            // Atur Response
            if ($insert_result == false) {
                echo "CANNOT INSERT";
                $response['status'] = 'failed';
                $response['message'] = 'Failed to insert values to DB!';
            } else {
                echo "SUCCESS";
                $response['status'] = 'success';
                $response['message'] = 'User Update Successful!';
                $_POST['loc'] = 'profile.php';
            }
        }
    }
} else {
    echo "PASS MISMATCH";
    $response['status'] = 'password mismatch';
    $response['message'] = 'Password and Confirm Password does not match!';
}




// Kembalikan response JSON
// echo json_encode($response);

// Atau langsung redirect
// // Harus Absolute URL
// if ($response['status'] == 'success')
//     header('Location: http://localhost:8080/uts/home.php');
// else
//     header('Location: http://localhost:8080/uts/signup.html');
