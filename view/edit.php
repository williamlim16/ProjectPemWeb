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
    $result2['gender'],
    $result2['profilePicturePath'],
    $result2['coverPath'],
    $result2['contact'],
    $result2['userdesc']
);

?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <div class="container col-sm-12 col-md-6 col-md-offset-3" style="margin-top:128px;">
        <h1 class="text-center mb-5 text-light">Edit Profile</h1>
        <div class="jumbotron" style="background-color:white !important;">
            <form action="" method="post">
                <!-- using MVC, no action -->
                <div class="form-group col-sm-12">
                    <label for="username" class="control-label"> Username </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input required readonly id="username" name="username" type="text" class="form-control" value="<?php echo $users->getUsername() ?>" />
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="email" class="control-label"> Email </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <input required id="user_email" name="email" type="email" class="form-control" value="<?php echo $users->getcontact() ?>" />
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="password" class="control-label"> Password </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input required id="user_password" name="user_password" type="password" class="form-control" placeholder="Insert your password here" />
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="confirm_password" class="control-label">
                        Confirm Password
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
                        <input required id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="Re-type your password here" />
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="firstname" class="control-label"> First Name </label>
                    <input required id="user_firstname" name="firstname" type="text" class="form-control" value="<?php echo $users->getfirstName() ?>" />
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="lastname" class="control-label"> Last Name </label>
                    <input required id="user_lastname" name="lastname" type="text" class="form-control" value="<?php echo $users->getlastName() ?>" />
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="phone_number" class="control-label">
                        Phone Number
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input required id="user_phone" name="phone_number" type="tel" class="form-control" placeholder="Insert your phone number (9-12 digits)" />
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="dateofbirth" class="control-label">
                        Date of Birth
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input required id="user_dob" name="date_of_birth" type="date" class="form-control" value="<?php echo $users->getbdate() ?>" min="" max="" />
                    </div>
                </div>
                <div class="form-inline form-group">
                    <label for="gender" class="control-label col-sm-12 text-left"> Gender </label>
                    <div class="form-group col-sm-4">
                        <input type="radio" name="gender" id="gender_male" class="form-control" value="M" />
                        <label for="gender_male" class="control-label"> Male </label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="radio" name="gender" id="gender_female" class="form-control" value="F" />
                        <label for="gender_female" class="control-label"> Female </label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="radio" name="gender" id="gender_other" class="form-control" value="O" />
                        <label for="gender_other" class="control-label"> Other</label>
                    </div>
                </div>
                <div class="form-inline form-group">
                    <label class="control-label col-sm-12" for="skills">Skills</label>
                    <div class="form-group col-sm-4">
                        <label for="photoshop" for="">Photoshop</label>
                        <input type="range" name="photoshop" class="custom-range" id="">
                    </div>
                </div>

                <input type="hidden" name="loc" value="profile.php"> <!-- MVC view controller-->
                <input type="hidden" name="do" value="edit_db.php"><!-- MVC controller-->
                <button class="btn btn-primary mt-5 col-sm-12">Submit</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>