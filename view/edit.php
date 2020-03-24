<!DOCTYPE html>

<?php

$query2 = "SELECT * FROM user WHERE username = '" . $_SESSION['user']->getusername() . "'";
$result2 = $conn->query($query2);
$result2 = $result2->fetch_assoc();

$users = new User(
    $result2['username'],
    $result2['firstName'],
    $result2['lastName'],
    $result2['password'],
    $result2['bdate'],
    $result2['phonenum'],
    $result2['gender'],
    $result2['profilePicturePath'],
    $result2['coverPath'],
    $result2['contact'],
    $result2['userdesc']
);

?>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/edit.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container col-sm-12 col-md-6 col-md-offset-3" style="margin-top:128px;">
        <h1 class="text-center mb-5 text-light">Edit Profile</h1>
        <div class="jumbotron" style="background-color:white !important;">
            <form action="" method="post">
                <!-- using MVC, no action -->
                <div class="form-group ">
                    <div class="form-row">
                        <div class="col">
                            <label for="username" class="control-label"> Username </label>
                            <input required readonly id="username" name="username" type="text" class="form-control rounder" value="<?php echo $users->getUsername() ?>" />
                        </div>
                        <div class="col">
                            <label for="email" class="control-label"> Email </label>
                            <input required id="user_email" name="email" type="email" class="form-control" value="<?php echo $users->getcontact() ?>" />
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <div class="form-row ">
                        <div class="col ">
                            <label for="password" class="control-label"> Password </label>
                            <input required id="user_password" name="user_password" type="password" class="form-control" placeholder="Insert your password here" />
                        </div>
                        <div class="col">
                            <label for="confirm_password" class="control-label">
                                Confirm Password
                            </label>
                            <input required id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="Re-type your password here" />
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="firstname" class="control-label"> First Name </label>
                            <input required id="user_firstname" name="firstname" type="text" class="form-control" value="<?php echo $users->getfirstName() ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="lastname" class="control-label"> Last Name </label>
                            <input required id="user_lastname" name="lastname" type="text" class="form-control" value="<?php echo $users->getlastName() ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="phone_number" class="control-label">Phone Number</label>
                            <input required id="user_phone" name="phone_number" type="tel" class="form-control" placeholder="Insert your phone number (9-12 digits)" value="<?php echo $users->getphonenum() ?>" />
                        </div>
                        <div class="col">
                            <label for="dateofbirth" class="control-label">Date of Birth</label>
                            <input required id="user_dob" name="date_of_birth" type="date" class="form-control" value="<?php echo $users->getbdate() ?>" min="" max="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Gender</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <input type="hidden" name="loc" value="profile.php"> <!-- MVC view controller-->
                            <input type="hidden" name="do" value="edit_db.php"><!-- MVC controller-->
                            <button class="btn btn-primary col-12">Submit</button>
                        </div>
                    </div>
                </form>
                    <div class="form-row">
                        <div class="col mt-3">
                            <form method="POST">
                                <input type="hidden" name="loc" value="profile.php"> <!-- MVC view controller-->
                                <button type="submit"class="btn btn-danger col-12">Cancel</button>
                        </form>
                        </div>
                    </div>
                </div>
            <form method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col mt-2">
                            <input type="hidden" name="loc" value="skills.php"> <!-- MVC view controller-->
                            <button class="btn btn-warning col-12">Edit Skills</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>