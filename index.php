<?php
//Starting session 
session_start();

//If session is not set then redirect to login page
if (!isset($_SESSION['username']))
{
    //Redirecting to login page
    header ("Location: login.php");

    //Stop script
    exit();
}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Homepage</title>
    </head>

    <body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <img src="UTM-LOGO-FULL.png" alt="UTM Logo" width="120" height="40">
                </a>

                <!--Toggle Button for mobile navigation-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Navigation Bar Links-->
                <div class="collapse navbar-collapse justify-content-end align-center" id = "main-nav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">List Students</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Add Student</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 70vh;"> <!--buat dia duduk center of the pg __ dlm satu container -->
            <h2 class="display-4 mb-3">Welcome <?php echo $_SESSION['username']; ?> </h2>
            <div class="bg-white p-4 rounded shadow">
                <p class="lead text-secondary">You are required to fill in the registration form to fill in your personal details.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="register.php" class="btn btn-primary btn-lg">Register Now</a>
                    <a href="view.php" class="btn btn-primary btn-lg">View List</a>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
