<!doctype html>
<html lang="en">


<head>
    <title>X-Self</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/home.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background: linear-gradient(to right, #0062E6, #33AEFF)">
        <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive; font-size:25px">Xpress Yourself</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">My Profile</a>
                </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link" data-toggle="dropdown">

                            <img src="resource/avatar.png" alt="Photo Avatar" id="profileavatar" class="avatar">

                        </a>

                        <div class="dropdown-menu dropdown-menu-right animate slideIn">
                            <a href="profile.php" class="dropdown-item">Signed in as
                                <br><strong>{{username}}</strong></a>
                            <div class="dropdown-divider"></div>
                            <a href="profile.php" class="dropdown-item">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a (click)="HeaderlogOut()" class="dropdown-item">Logout</a>
                        </div>

                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="card text-left" style="margin: 20px">
            <div class="card-header">
                <img src="resource/avatar.png" class="float-left ava">
                <span class="d-inline-block align-middle">
                    <h5>
                        Username
                    </h5>
                </span>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <h2>
                        Post Title
                    </h2>
                </div>
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque corporis tempora
                    aspernatur laborum repellat deleniti eum odit impedit quis. Cum facilis tempora dolorem
                    exercitationem consequuntur tenetur, natus voluptates assumenda hic vitae. Dicta officiis odit omnis
                    saepe exercitationem cumque assumenda repellendus at asperiores qui error quis, laboriosam magni
                    voluptates nisi pariatur totam deleniti molestiae porro nihil voluptatum. Perferendis accusamus
                    quaerat sequi? Similique nemo nostrum quibusdam exercitationem, porro dignissimos architecto
                    consequatur magni pariatur maxime reiciendis deserunt dolorum atque incidunt fuga harum veniam
                    expedita mollitia sit, commodi, quo inventore placeat? Rerum, eius nobis sequi sed, repudiandae
                    ullam, consequatur omnis et ab eos fugiat?</p>
            </div>
        </div>
        <div class="card text-left" style="margin: 20px">
            <div class="card-body">
                <h4 class="card-title">Post Title</h4>
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque corporis tempora
                    aspernatur laborum repellat deleniti eum odit impedit quis. Cum facilis tempora dolorem
                    exercitationem consequuntur tenetur, natus voluptates assumenda hic vitae. Dicta officiis odit omnis
                    saepe exercitationem cumque assumenda repellendus at asperiores qui error quis, laboriosam magni
                    voluptates nisi pariatur totam deleniti molestiae porro nihil voluptatum. Perferendis accusamus
                    quaerat sequi? Similique nemo nostrum quibusdam exercitationem, porro dignissimos architecto
                    consequatur magni pariatur maxime reiciendis deserunt dolorum atque incidunt fuga harum veniam
                    expedita mollitia sit, commodi, quo inventore placeat? Rerum, eius nobis sequi sed, repudiandae
                    ullam, consequatur omnis et ab eos fugiat?</p>

            </div>
        </div>


    </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>