<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/skills.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container col-sm-12 col-md-6 col-md-offset-3" style="margin-top:128px;">
        <h1 class="text-center mb-5 text-light">Edit Skills</h1>
        <div class="jumbotron" style="background-color:white !important;">
            <form method="post">
                <div class="form-group">
                    <?php
                    $query = "SELECT * FROM skills WHERE username_fk =  '" . $_SESSION['user']->getusername() . "'";
                    $result = $conn->query($query);
                    $skills = array();
                    foreach ($result as $row2) array_push($skills, new Skills($row2['username_fk'], $row2['skills'], $row2['percent']));
                    foreach ($skills as $row2) { ?>
                        <div class="form-row">
                            <div class="col">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <button type="button" class="close d-flex flex-row-reverse mb-5" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <label class="card-title" for="<?php echo $row2->getskills() ?>"><?php echo $row2->getskills() ?></label>
                                        <input type="range" name="percent[]" class="custom-range" min="0" max="100" value="<?php echo $row2->getpercentage() ?>">
                                        <input type="hidden" name="name[]" class="custom-range" value="<?php echo $row2->getusername() ?>">
                                        <input type="hidden" name="skills[]" class="custom-range" value="<?php echo $row2->getskills() ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="hidden" name="loc" value="skills.php"> <!-- MVC view controller-->
                        <input type="hidden" name="do" value="skills_db.php"><!-- MVC controller-->
                        <button class="btn btn-success col-12" type="submit">Add</button>
                    </div>
                </div>
            </form>
            <form method="post">
                <div class="form-row">
                    <div class="col mt-3">
                        <input type="hidden" name="loc" value="edit.php"> <!-- MVC view controller-->
                        <button class="btn btn-danger col-12" type="submit">Cancel</button>
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