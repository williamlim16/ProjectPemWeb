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
    $user_skills = sterilize_input($_POST['skill']); //new addition, database's primary key
    // Sesuaikan nama tabel di sini
    $table_name = 'skills';
    // Periksa apakah berhasil connect
    if ($conn->connect_errno) {
        $response['status'] = 'DB connect failed';
        $response['message'] = 'Failed to connect to DB!';
    } else { // Aman, berhasil konek
        // Periksa Primary Key Duplikat
        // Primary key = username
        $check_query = "DELETE FROM skills WHERE username_fk='$user_username' AND skills='$user_skills'"; //ga perlu pake limit
        $insert_result = $conn->query($check_query);
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
