<?php
    function sterilize_input($input){
        $input = trim($input); // Ngilangin spasi, enter dll
        $input = strip_tags($input); //Ilangin < dan >
        $input = stripslashes($input); //utk escape " atau '
        $input = htmlspecialchars($input); //Mirip strip-tag
        return $input;
    }

    $response= [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Ambil data-data dari form
        $user_email = sterilize_input($_POST['email']);
        $user_gender = sterilize_input($_POST['gender']);
        $user_password = sterilize_input($_POST['password']);
        $user_lastname = sterilize_input($_POST['lastname']);
        $user_firstname = sterilize_input($_POST['firstname']);
        $user_dateofbirth = sterilize_input($_POST['date_of_birth']);
        $user_phone_number = sterilize_input($_POST['phone_number']);
        
        $confirm_password = sterilize_input($_POST['confirm_password']);

        if($user_password == $confirm_password){
            // Connect ke DB
            $conn = new mysqli('localhost', 'root', '', 'sosmed');
            // Sesuaikan nama tabel di sini
            $table_name = '';

            // Periksa apakah berhasil connect
            if($conn->connect_errno){
                $response['status'] = 'DB connect failed';
                $response['message'] = 'Failed to connect to DB!';
            } else { // Aman, berhasil konek
                // Periksa Primary Key Duplikat
                $check_query = "SELECT email FROM $table_name WHERE email='$user_email' LIMIT BY 1";
                $result = $conn->query($check_query);
                $duplikat = $result->num_rows() != 0;

                if($duplikat == true){
                    $response['status'] = 'duplicate';
                    $response['message'] = 'That email already exists!';
                } else { // Aman, no duplikat
                    // Tambahkan pemeriksaan2 atau perubahan value di sini
                    
                    // Insert ke DB
                    $insert_query = "INSERT INTO $table_name VALUE('$user_email', '$user_password', '$user_firstname', '$user_lastname', '$user_phone_number', '$user_dateofbirth', '$user_gender')";

                    // Cek hasil insert
                    $insert_result = $conn->query($insert_query);

                    // Atur Response
                    if($insert_result == false){
                        $response['status'] = 'failed';
                        $response['message'] = 'Failed to insert values to DB!';
                    } else {
                        $response['status'] = 'success';
                        $response['message'] = 'User Sign Up Successful!';
                    }
                }
            }
        } else {
            $response['status'] = 'password mismatch';
            $response['message'] = 'Password and Confirm Password does not match!';
        }
    } else {
        $response['status'] = 'method not allowed';
        $response['message'] = 'Only accessible via POST Method!';
    }

    // Kembalikan response JSON
    // echo json_encode($response);

    // Atau langsung redirect
    // Harus Absolute URL
    if($response['status'] == 'success')
        header('Location: http://localhost:8080/uts/home.php');
    else
        header('Location: http://localhost:8080/uts/signup.html');
?>