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
    $user_password = sterilize_input($_POST['password']);
    $user_lastname = sterilize_input($_POST['lastname']);
    $user_firstname = sterilize_input($_POST['firstname']);
    $user_dateofbirth = sterilize_input($_POST['date_of_birth']);
    $user_phone_number = sterilize_input($_POST['phone_number']);

    $confirm_password = sterilize_input($_POST['confirm_password']);

    if ($user_password == $confirm_password) {
        // Connect ke DB
        $conn = new mysqli('localhost', 'root', '', 'sosmed');
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

            if ($duplikat == true) {
                echo "DUPE";
                $response['status'] = 'duplicate';
                $response['message'] = 'Username already exists!';
            } else { // Aman, no duplikat
                // Tambahkan pemeriksaan2 atau perubahan value di sini

                // Insert ke DB
                $insert_query = "INSERT INTO $table_name (username, password, firstName, lastName, bdate, gender, contact)
                VALUE('$user_username', '$user_password', '$user_firstname', '$user_lastname', '$user_dateofbirth', '$user_gender', '$user_email')";
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
                    $response['message'] = 'User Sign Up Successful!';
                    $_POST['loc'] = 'login.php';
                }
            }
        }
    } else {
        echo "PASS MISMATCH";
        $response['status'] = 'password mismatch';
        $response['message'] = 'Password and Confirm Password does not match!';
    }
} else {
    echo "WRONG METHODD";

    $response['status'] = 'method not allowed';
    $response['message'] = 'Only accessible via POST Method!';
}

// Kembalikan response JSON
// echo json_encode($response);

// Atau langsung redirect
// // Harus Absolute URL
// if ($response['status'] == 'success')
//     header('Location: http://localhost:8080/uts/home.php');
// else
//     header('Location: http://localhost:8080/uts/signup.html');